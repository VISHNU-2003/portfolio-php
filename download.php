<?php
$cvFilePath = 'C:\xampp1\htdocs\project\Vishnu_resume.pdf'; // Update with the actual file path


if (file_exists($cvFilePath)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Vishnu_resume.pdf"'); // You can change the filename if needed

    readfile($cvFilePath);
} else {
    echo 'CV file not found.';
}
