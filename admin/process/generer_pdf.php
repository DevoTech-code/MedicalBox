<?php
require_once 'connectDB.php';
require '../fpdf/fpdf.php';

$patientId = $_POST['patient_id'] ?? null;

if ($patientId) {
    $query = $db->prepare("SELECT * FROM ficheData WHERE id = :id");
    $query->execute(['id' => $patientId]);
    $patient = $query->fetch(PDO::FETCH_ASSOC);

    if ($patient) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(40, 10, "Fiche Patient", 0, 1);
        $pdf->SetFont('Arial', '', 12);

        foreach ($patient as $key => $value) {
            $pdf->Cell(40, 10, ucfirst(str_replace('_', ' ', $key)) . ' : ' . $value, 0, 1);
        }

        $pdf->Output('D', "patient_{$patientId}.pdf");
        exit;
    }
}
header('Location: ../PHP/export.php');
?>
