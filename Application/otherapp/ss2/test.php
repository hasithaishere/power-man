<?php
// The "i" after the pattern delimiter indicates a case-insensitive search
if (preg_match("/Socket o/i", "UPDATE power_subdevice_control SET control_status = CASE WHEN device_id = 'Socket on@48575E6E' THEN 'ELSE control_status END")) {
    echo "A match was found.";
} else {
    echo "A match was not found.";
}
?>
