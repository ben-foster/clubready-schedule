<?php

class ClubReady_Schedule_Class {

    // TODO: annotate
    public $class_id;
    public $schedule_id;
    public $club_id;
    public $date;
    public $title;
    public $description;
    public $start_time;
    public $end_time;
    public $instructor_id;
    public $instructor_store_id;
    public $instructor_first_name;
    public $instructor_last_name;
    public $can_directly_book_public;
    public $category_names;
    public $free_spots;
    
    public function __construct( $clubready_class ) {
        $this->class_id = $clubready_class["ClassId"];
        $this->schedule_id = $clubready_class["ScheduleId"];
        $this->club_id = $clubready_class["ClubId"];
        $this->date = $clubready_class["Date"];
        $this->title = $clubready_class["Title"];
        $this->description = $clubready_class["Description"];
        $this->start_time = $clubready_class["StartTime"];
        $this->end_time = $clubready_class["EndTime"];
        $this->instructor_id = $clubready_class["InstructorId"];
        $this->instructor_store_id = $clubready_class["InstructorStoreId"];
        $this->instructor_first_name = $clubready_class["InstructorFirstName"];
        $this->instructor_last_name = $clubready_class["InstructorLastName"];
        $this->can_directly_book_public = $clubready_class["CanDirectlyBookPublic"];
        $this->category_names = $clubready_class["CategoryNames"];
        $this->free_spots = $clubready_class["FreeSpots"];
    }
    
}