<?php
namespace common\services;

use common\models\Patient;

interface PatientServiceInterface
{
    /**
     * @param Patient $patient
     * @param array|null $data
     * @return boolean
     */
    public function saveModel(Patient $patient, $data);
}
