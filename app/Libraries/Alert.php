<?php

    namespace App\Libraries;

    class Alert{
        
        static function success($text)
        {
            return "<div class='alert alert-success alert-dismissible  show' role='alert'> 
            <button type='button' 
            class='pull-right close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button> 
            $text </div>";
        }

        static function danger($text)
        {
            return "<div class='alert alert-danger alert-dismissible  show' role='alert'>
            <button type='button' 
            class='close pull-right' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
            $text  </div>";
        }

        static function warning($text)
        {
            return "<div class='alert alert-warning alert-dismissible  show' role='alert'> 
            <button type='button pull-right' 
            class='close pull-right' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
            $text  </div>";
        }

        static function info($text)
        {
            return "<div class='alert alert-info alert-dismissible  show' role='alert'> 
            <button type='button pull-right' 
            class='close pull-right' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
            $text  </div>";
        }
    }