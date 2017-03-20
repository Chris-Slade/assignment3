<?php 
  // this file will extend ParentClass.php

  class MarkdownFormatter extends Formatter {
    public function get_formatted() {
      $formatted = $this->text;

      // Start with headings, handle up to H3.
      $formatted = preg_replace('/^###\s*(.+)$/m', '<h3>\1</h3>', $formatted);
      $formatted = preg_replace('/^##\s*(.+)$/m',  '<h2>\1</h2>', $formatted);
      $formatted = preg_replace('/^#\s*(.+)$/m',   '<h1>\1</h1>', $formatted);

      // Handle bold and italics
      $formatted = preg_replace(
        '/\*\*([^*]+)\*\*/',
        '<strong>\1</strong>',
        $formatted
      );
      $formatted = preg_replace(
        '/\*([^*]+)\*/',
        '<em>\1</em>',
        $formatted
      );
      // Handle inline code
      $formatted = preg_replace(
        '/`([^`]+)`/',
        '<code>\1</code>',
        $formatted
      ); 
      return $formatted;
    }
  }

// vim: set sw=2 ts=2 sts=2:
