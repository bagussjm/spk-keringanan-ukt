<?php

namespace App\Http\Resources;

use App\Models\GolonganUkt;
use App\Models\JumlahTanggungan;
use App\Models\KeteranganTerdampakCovid;
use App\Models\PenghasilanOrangtua;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MooraDecisionMatrixResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama_mhs,
            'nim' => $this->nim_mhs,
            'kode_kriteria' => 'A'.$this->id,
            'k1_name' => 'keterangan_terdampak',
            'k1_value' => $this->keteranganTerdampak->nilai_terdampak,
            'k2_name' => 'penghasilan_orangtua',
            'k2_value' => $this->penghasilanOrangtua->nilai_penghasilan,
            'k3_name' => 'jumlah_tanggungan',
            'k3_value' => $this->jumlahTanggungan->nilai_tanggungan,
            'k4_name' => 'golongan_ukt',
            'k4_value' => $this->golonganUkt->nilai_golongan_ukt
        ];
    }

    /**
     * get final criteria decision matrix value
     * @param ResourceCollection $criteriaFuzzyValue
     * @param mixed $criteria
     * @return float
     * */
    public static function criteriaDecisionMatrixValue(ResourceCollection $criteriaFuzzyValue, $criteria)
    {
        $sqrtValue = 0;
        $criteriaFuzzyValues = collect($criteriaFuzzyValue)->pluck($criteria)->all();
        foreach ($criteriaFuzzyValues as $value){
            if ($value){
                $sqrtValue += pow($value, 2);
            }
        }

        return sqrt($sqrtValue);
    }

    /**
     * normalize decision matrix for each row on Moora fuzzy value
     * @param ResourceCollection $criteriaFuzzyValue
     * @return array
     * */
    public static function normalizeDecisionMatrixValue(ResourceCollection $criteriaFuzzyValue)
    {
        $normalizedDecisionMatrix = [];

        $k1DecisionMatrixValue = self::criteriaDecisionMatrixValue($criteriaFuzzyValue, 'k1_value');
        $k2DecisionMatrixValue = self::criteriaDecisionMatrixValue($criteriaFuzzyValue, 'k2_value');
        $k3DecisionMatrixValue = self::criteriaDecisionMatrixValue($criteriaFuzzyValue, 'k3_value');
        $k4DecisionMatrixValue = self::criteriaDecisionMatrixValue($criteriaFuzzyValue, 'k4_value');

        foreach (collect($criteriaFuzzyValue)->all() as $fuzzyValue) {
            $fuzzyValue['k1_normalized_value'] = $fuzzyValue['k1_value']/$k1DecisionMatrixValue;
            $fuzzyValue['k2_normalized_value'] = $fuzzyValue['k2_value']/$k2DecisionMatrixValue;
            $fuzzyValue['k3_normalized_value'] = $fuzzyValue['k3_value']/$k3DecisionMatrixValue;
            $fuzzyValue['k4_normalized_value'] = $fuzzyValue['k4_value']/$k4DecisionMatrixValue;
            $normalizedDecisionMatrix[] = $fuzzyValue;
        }

        return $normalizedDecisionMatrix;
    }

    public static function weightedNormalizedDecisionMatrixValue(array $normalizedMatrixValue)
    {
        $weightedNormalizedDecisionMatrix = [];

        foreach (collect($normalizedMatrixValue)->all() as $normalized) {
            $normalized['k1_weighted_normalized_matrix_value'] = $normalized['k1_normalized_value']*KeteranganTerdampakCovid::$criteriaWeight;
            $normalized['k2_weighted_normalized_matrix_value'] = $normalized['k2_normalized_value']*PenghasilanOrangtua::$criteriaWeight;
            $normalized['k3_weighted_normalized_matrix_value'] = $normalized['k3_normalized_value']*JumlahTanggungan::$criteriaWeight;
            $normalized['k4_weighted_normalized_matrix_value'] = $normalized['k4_normalized_value']*GolonganUkt::$criteriaWeight;
            $weightedNormalizedDecisionMatrix[] = $normalized;
        }

        return $weightedNormalizedDecisionMatrix;
    }

    public static function optimizeValue(array $weightedNormalizedDecisionMatrix)
    {
        $optimizedValue = [];

        foreach (collect($weightedNormalizedDecisionMatrix)->all() as $weighted) {
            // penjumlahan nilai kriteria yang bertipe Benefit
            $weighted['maximum_value'] = ($weighted['k1_weighted_normalized_matrix_value'])+
                ($weighted['k3_weighted_normalized_matrix_value'])+($weighted['k4_weighted_normalized_matrix_value']);
            // penjumlahan nilai kriteria yang bertipe cost
            $weighted['minimum_value'] = $weighted['k2_weighted_normalized_matrix_value'];

            // nilai optimasi setiap alternatif = maximum kriteria - minimum kriteria
            $weighted['yi_value'] = $weighted['maximum_value'] - $weighted['minimum_value'];
            $optimizedValue[] = $weighted;
        }

        return $optimizedValue;
    }

}
