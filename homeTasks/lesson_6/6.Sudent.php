<?php

class Student
{
    private $firstname;
    private $lastname;
    private $gender;
    private $status;
    private $gpa;

    /**
     * Student constructor.
     * @param $firstname
     * @param $lastname
     * @param $gender
     * @param $status
     * @param $gpa
     * @throws Exception
     */
    public function __construct($firstname, $lastname, $gender, $status, $gpa)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->setGender($gender);
        $this->setStatus($status);
        $this->setGpa($gpa);
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param mixed $gender
     * @throws Exception
     */
    protected function setGender($gender)
    {
        try {
            if (($gender === 'male') || ($gender === 'female')) {
                $this->gender = $gender;
            } else {
                throw new RuntimeException('Gender could be only Male or Female');
            }
        } catch (RuntimeException $exception){
            $this->gender = 'null';
            echo 'Error: Gender could be only Male or Female', PHP_EOL;
        }

    }

    /**
     * @param mixed $status
     */
    protected function setStatus($status)
    {
        $statusesList = ['freshman', 'sophomore', 'junior', 'senior'];
        $this->status = in_array($status, $statusesList, 1) ? $status : 'null';
    }

    /**
     * @param mixed $gpa
     */
    protected function setGpa($gpa)
    {
        $this->gpa = ($gpa >= 0 && $gpa <= 4.0) ? $gpa : 0 ;
    }

    /**
     *Shows all information about the Student
     */
    public function showMyself()
    {
        echo 'Student ', $this->firstname, ' ', $this->lastname, ', have a gender - ', $this->gender, PHP_EOL;
        echo 'Student\'s status - ', $this->status, PHP_EOL;
        echo 'Student\'s GPA is ',  number_format($this->gpa,2), PHP_EOL;
    }

    /**
     * @param $study_time in minutes, for the calculation using hours
     */
    public function studyTime($study_time)
    {
        $this->gpa = ($this->gpa + log($study_time/60)) > 4.0
            ? 4.0
            : round(($this->gpa + log($study_time/60)),2 );
    }

    public function __toString()
    {
        return 'Student ' . $this->firstname . ' ' . $this->lastname . ', ' . $this->gender . PHP_EOL .
            'Status - ' . $this->status . ', GPA is ' . number_format($this->gpa,2) . PHP_EOL;
    }


    public function __get($some)
    {
        if (property_exists($this, $some)) {
            return $this->$some;
        }
    }

    public function __invoke($study_time)
    {
        $this->gpa = ($this->gpa + log($study_time/60)) > 4.0
            ? 4.0
            : round(($this->gpa + log($study_time/60)),2 );
        return $this->gpa;
    }


}

$studentsList = [
    $first = ['Mike', 'Barnes', 'male', 'freshman', 4],
    $second = ['Jim', 'Nickerson', 'male', 'sophomore', 3],
    $third = ['Jack', 'Indabox', 'male', 'junior', 2.5],
    $fourth = ['Jane', 'Miller', 'female', 'senior', 3.6],
    $fifth = ['Mary', 'Scott', 'female', 'senior', 2.7],
];

$student = [];

for ($i = 0; $i < count($studentsList); $i++  ) {
    $student[$i] = new Student(($studentsList[$i][0]),
                               ($studentsList[$i][1]),
                               ($studentsList[$i][2]),
                               ($studentsList[$i][3]),
                               ($studentsList[$i][4]));
}

foreach ($student as $key => $value) {
    $value->showMyself();
    echo PHP_EOL;
}

$stadyMinutes = [60, 100, 40, 300, 1000];
for ($i = 0; $i < count($studentsList); $i++  ) {
    $student[$i]->studyTime($stadyMinutes[$i]);
}

echo 'Updated results:', PHP_EOL;
foreach ($student as $key => $value) {
    $value->showMyself();
    echo PHP_EOL;
}

echo $student[1]->gpa, PHP_EOL; // __get

echo $student[1]; // __toString

$workingTime = 100000;
echo 'Student ', $student[1]->firstname, ' ', $student[1]->lastname, "worked very hard and till $workingTime minutes and changed GPA to ",
    $student[1]($workingTime), PHP_EOL ; // __invoke + __get

