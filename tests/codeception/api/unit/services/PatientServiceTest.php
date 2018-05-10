<?php
namespace tests\codeception\api\unit\services;

use PHPUnit_Framework_MockObject_MockObject as MockObject;
use yii\codeception\TestCase;
use common\services\PatientService;
use common\models\Patient;
use common\models\query\NutritionQuery;
use common\models\query\NutritionalDiagnosisQuery;

class PatientServiceTest extends TestCase
{
    /** @var PatientService */
    protected $service;

    /** @var Patient | MockObject */
    protected $patientMock;

    /** @var NutritionQuery | MockObject */
    protected $nutritionQueryMock;

    /** @var NutritionalDiagnosisQuery | MockObject */
    protected $nutritionalDiagnosisQueryMock;

    public function setUp()
    {
        $this->nutritionQueryMock = $this->getMockBuilder(NutritionQuery::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->nutritionalDiagnosisQueryMock = $this->getMockBuilder(NutritionalDiagnosisQuery::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->patientMock = $this->getMockBuilder(Patient::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->service = new PatientService(
            $this->nutritionQueryMock,
            $this->nutritionalDiagnosisQueryMock
        );
    }

    /**
     * @param array $requestData
     * @param boolean $loadResult
     * @param boolean $saveResult
     * @param boolean $expectedResult
     * @dataProvider saveModelProvider
     */
    public function testBaseSaveModel(
        array $requestData,
        $loadResult,
        $saveResult,
        $expectedResult
    ) {
        $this->patientMock->expects($this->once())
            ->method('load')
            ->willReturn($loadResult);
        $this->patientMock
            ->method('save')
            ->willReturn($saveResult);
        $result = $this->service->saveModel($this->patientMock, $requestData);
        $this->assertEquals($result, $expectedResult);
    }

    public function saveModelProvider()
    {
        return [
            'load fail' => [
                [],
                false,
                true,
                false,
            ],
            'save fail' => [
                [],
                true,
                false,
                false,
            ],
            'success' => [
                [],
                true,
                true,
                true,
            ],
        ];
    }

    /**
     * @param array $requestData
     * @param array $nutritionMap
     * @param array $linkedNutrition
     * @dataProvider nutritionSaveProvider
     */
    public function testNutritionSave(
        array $requestData,
        array $nutritionMap,
        array $linkedNutrition
    ) {
        $this->patientMock->expects($this->once())
            ->method('load')
            ->willReturn(true);
        $this->patientMock->expects($this->once())
            ->method('save')
            ->willReturn(true);
        $this->patientMock->expects($this->once())
            ->method('unlinkAll')
            ->with('nutrition', true);
        $this->nutritionQueryMock->expects($this->exactly(count($nutritionMap)))
            ->method('getById')
            ->will($this->returnValueMap($nutritionMap));
        $this->patientMock->expects($this->exactly(count($linkedNutrition)))
            ->method('link')
            ->with('nutrition', call_user_func_array([$this,'logicalOr'], $linkedNutrition));
        $this->service->saveModel($this->patientMock, $requestData);
    }

    public function nutritionSaveProvider()
    {
        return [
            'empty' => [
                ['nutrition' => []],
                [],
                [],
            ],
            'few links' => [
                ['nutrition' => [1, 2, 3]],
                [
                    [1, 'nutrition 1'],
                    [2, 'nutrition 2'],
                    [3, 'nutrition 3'],
                ],
                [
                    'nutrition 1',
                    'nutrition 2',
                    'nutrition 3',
                ]
            ],
        ];
    }


    /**
     * @param array $requestData
     * @param array $nutritionMap
     * @param array $linkedNutrition
     * @dataProvider nutritionalDiagnosisProvider
     */
    public function testNutritionalDiagnosisSave(
        array $requestData,
        array $nutritionMap,
        array $linkedNutrition
    ) {
        $this->patientMock->expects($this->once())
            ->method('load')
            ->willReturn(true);
        $this->patientMock->expects($this->once())
            ->method('save')
            ->willReturn(true);
        $this->patientMock->expects($this->once())
            ->method('unlinkAll')
            ->with('nutritionalDiagnosis', true);
        $this->nutritionalDiagnosisQueryMock->expects($this->exactly(count($nutritionMap)))
            ->method('getById')
            ->will($this->returnValueMap($nutritionMap));
        $this->patientMock->expects($this->exactly(count($linkedNutrition)))
            ->method('link')
            ->with('nutritionalDiagnosis', call_user_func_array([$this,'logicalOr'], $linkedNutrition));
        $this->service->saveModel($this->patientMock, $requestData);
    }

    public function nutritionalDiagnosisProvider()
    {
        return [
            'empty' => [
                ['nutritionalDiagnosis' => []],
                [],
                [],
            ],
            'few links' => [
                ['nutritionalDiagnosis' => [4, 5, 6]],
                [
                    [4, 'nutrition diagnosis 1'],
                    [5, 'nutrition diagnosis 2'],
                    [6, 'nutrition diagnosis 3'],
                ],
                [
                    'nutrition diagnosis 1',
                    'nutrition diagnosis 2',
                    'nutrition diagnosis 3',
                ]
            ],
        ];
    }
}
