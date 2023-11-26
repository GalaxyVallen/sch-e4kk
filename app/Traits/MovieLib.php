<?php
namespace App\Traits;

/**
 * Biar ga rame
 */
trait MovieLib
{
  public function formatRuntime($minutes)
  {
    $hours = floor($minutes / 60);
    $remainingMinutes = $minutes % 60;

    return sprintf('%dh %02dm', $hours, $remainingMinutes);
  }
}
