<?php

//Define a student class. A student has the following attributes: `firstname`, `lastname`, `gender` which can be "male"
// or "female", `status` which can be equal to "freshman", "sophomore", "junior", and "senior" and "gpa".
//
//Then define the following methods for the student class.
//
//The `showMyself` method will simply print all the attribute variables when called upon the object.
// This method has no input arguments.
//The `studyTime` method will increment the gpa of the student according to the following formula: `
// gpa = gpa + log(study_time)`.
// The only input argument of this method is the variable study_time. In addition make sure that the gpa
// variable never exceeds 4.0 even if the student studies for a very long time.
//
//Now define 5 student objects and store the objects in an array called studentList. The five students are: Mike Barnes,
// Jim Nickerson, Jack Indabox, Jane Miller and Mary Scott. Mike is a freshman, Jim a sophomore, Jack a junior,
// Jane and Mary are seniors. Their respective GPAs are: 4, 3, 2.5, 3.6 and 2.7.
// Make sure you assign the gender when you instantiate the objects.
//
//Then call the showMyself method on all of them.
// I suggest you use a loop for making the objects and a separate loop for showing the objects.

//Use your objects from above and let each one of the 5 students study for 60, 100, 40, 300, 1000 minutes, respectively.
// So the first student studies 60 minutes, the second studies 100 minutes, etc. After that call the showMyself methods
// on all 5 again and check whether their new gpa reflects how much they studied.

//Well, now use magic methods from the link http://php.net/manual/en/language.oop5.magic.php
// and try to refactor your code using these methods. Imagine additional cases for your code if needed.

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
    public function setGender($gender)
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
    public function setStatus($status)
    {
        $statusesList = ['freshman', 'sophomore', 'junior', 'senior'];
        $this->status = in_array($status, $statusesList, 1) ? $status : 'null';
    }

    /**
     * @param mixed $gpa
     */
    public function setGpa($gpa)
    {
        $this->gpa = ($gpa >= 0 && $gpa <= 4.0) ? $gpa : 0 ;
    }

    public function showMyself()
    {
        echo 'Student ', $this->firstname, ' ', $this->lastname, ', have gender ', $this->gender, PHP_EOL;
        echo 'Student\'s status - ', $this->status, PHP_EOL;
        echo 'Student\'s GPA is ', $this->gpa, PHP_EOL;
    }

    /**
     * @param $study_time in minutes, for the calculation using hours
     */
    public function studyTime($study_time)
    {
        $this->gpa = ($this->gpa + log($study_time/60)) > 4.0
            ? 4.0
            : round(($this->gpa + log($study_time/60)),2 );
        var_dump($this->gpa).PHP_EOL;
    }



}


$student = new Student('Oleg', 'LLolo', 'asdasd', 'freshman', 1);
$student->studyTime(1000);
$student->showMyself();
