<?php 
  // this file will extend ParentClass.php

  class MarkdownFormatter extends Formatter {
    public function get_formatted() {
      $formatted = $this->text;

      $transformations = array(
        // Escape ampersands
        array('/&/', '&amp;'),
        // Headings up to 3
        array('/^###\s*(.+)$/m', '<h3>\1</h3>'),
        array('/^##\s*(.+)$/m',  '<h2>\1</h2>'),
        array('/^#\s*(.+)$/m',   '<h1>\1</h1>'),
        // Bold and italics
        array('/\*\*([^*]+)\*\*/', '<strong>\1</strong>'),
        array('/\*([^*]+)\*/', '<em>\1</em>'),
        // Inline code
        array('/`([^`]+)`/', '<code>\1</code>'),
        // Typography
        array('/\.\.\./', '&hellip;'),
        array('/---/', '&mdash;')
      );

      foreach ($transformations as &$transformation) {
        $formatted = preg_replace(
          $transformation[0],
          $transformation[1],
          $formatted
        );
      }

      return $formatted;
    }
  }

// vim: set sw=2 ts=2 sts=2:
