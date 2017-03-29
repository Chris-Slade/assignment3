<?php
  // This is the file for the parent class

  class Formatter {
    protected $text;

    public function __construct($input) {
      if (is_null($input)) {
        throw new Exception("Text cannot be null");
      }
      if (!is_array($input)) {
        throw new Exception("Expected array of input lines");
      }
      $input = array_map('trim', $input);
      $this->text = $input;
    }

    // Subclasses should override this
    public function get_formatted() {
      return join("\n", $this->text);
    }

    public function get_text() {
      return $this->text;
    }

    private function get_text_string() {
      return join("\n", $this->text);
    }

    public function __clone() {
      return new Formatter($this->text);
    }

    public function __toString() {
      return get_class($this) 
        . "(\"" 
        . join("\\n", $this->text)
        . "\")";
    }
  }

// vim: set sw=2 ts=2 sts=2:
