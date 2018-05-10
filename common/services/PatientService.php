<?php
namespace common\services;

use common\models\Patient;
use common\models\query\NutritionQuery;
use common\models\query\NutritionalDiagnosisQuery;

class PatientService implements PatientServiceInterface
{
    /**
     * @var NutritionQuery
     */
    protected $nutritionQuery;

    /**
     * @var NutritionalDiagnosisQuery
     */
    protected $nutritionalDiagnosisQuery;

    public function __construct(NutritionQuery $nutritionQuery, NutritionalDiagnosisQuery $nutritionalDiagnosisQuery)
    {
        $this->nutritionQuery = $nutritionQuery;
        $this->nutritionalDiagnosisQuery = $nutritionalDiagnosisQuery;
    }


    /**
     * @inheritdoc
     */
    public function saveModel(Patient $patient, $data)
    {
        if (!$patient->load($data, '') || !$patient->save()) {
            return false;
        }
        if (isset($data['nutrition']) && is_array($data['nutrition'])) {
            $this->saveNutrition($patient, $data['nutrition']);
        }
        if (isset($data['nutritionalDiagnosis']) && is_array($data['nutritionalDiagnosis'])) {
            $this->saveNutritionalDiagnosis($patient, $data['nutritionalDiagnosis']);
        }
        return true;
    }

    /**
     * @param Patient $patient
     * @param array $nutritionIds
     */
    protected function saveNutrition(Patient $patient, array $nutritionIds)
    {
        $patient->unlinkAll('nutrition', true);
        foreach ($nutritionIds as $nutritionId) {
            $patient->link('nutrition', $this->nutritionQuery->getById($nutritionId));
        }
    }

    /**
     * @param Patient $patient
     * @param array $diagnosisIds
     */
    protected function saveNutritionalDiagnosis(Patient $patient, array $diagnosisIds)
    {
        $patient->unlinkAll('nutritionalDiagnosis', true);
        foreach ($diagnosisIds as $diagnosisId) {
            $patient->link(
                'nutritionalDiagnosis',
                $this->nutritionalDiagnosisQuery->getById($diagnosisId)
            );
        }
    }
}
