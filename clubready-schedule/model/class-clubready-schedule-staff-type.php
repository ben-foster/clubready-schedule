<?php

class ClubReady_Schedule_Staff_Type {
    
    // TODO: annotate
    public $id;
    public $title;

    public function __construct( $clubready_staff_type ) {
        $this->id = $clubready_staff["Id"];
        $this->title = $clubready_staff["Title"];
    }
           
}