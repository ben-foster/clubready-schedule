<?php

class ClubReady_Schedule_Class_Schedule {

    // TODO: annotate
    public $classes;
    public $from_date;
    public $to_date;
    public $chain_id;
    public $club_id;
    public $instructor_id;
    public $class_id;

    public function __construct( $from_date, $to_date, $chain_id, $club_id = NULL, $instructor_id = NULL, $class_id = NULL ) {
        $this->classes = array();

        $this->from_date = $from_date;
        $this->to_date = $to_date;
        $this->chain_id = $chain_id;
        $this->club_id = $club_id;
        $this->instructor_id = $instructor_id;
        $this->class_id = $class_id;
    }

    public function add( $class ) {
        array_push( $this->classes, $class );
    }

    public function filter() {
        $filtered_classes = $classes;

        $filtered_classes = array_filter( $filtered_classes, function( $class ){
            if( is_null( $this->club_id ) ){
                return $class->club_id == $this->club_id;
            } else {
                return True;
            }
        });

        $filtered_classes = array_filter( $filtered_classes, function( $class ){
            if( is_null( $this->instructor_id ) ){
                return $class->instructor_id == $this->instructor_id;
            } else {
                return True;
            }
        });

        $filtered_classes = array_filter( $filtered_classes, function( $class ){
            if( is_null( $this->class_id ) ){
                return $class->class_id == $this->class_id;
            } else {
                return True;
            }
        });

        return $filtered_classes;

    }
    
}