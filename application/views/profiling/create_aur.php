<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
  header('Content-Type: application/json');

  $uploadDir = 'C:/laragon/www/boy-scout-ph-webapp/upload/';

  if (!file_exists($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true)) {
      echo json_encode(['success' => false, 'message' => 'Failed to create upload directory']);
      exit;
    }
  }

  if (!is_writable($uploadDir)) {
    echo json_encode(['success' => false, 'message' => 'Upload directory is not writable. Please check permissions.']);
    exit;
  }

  $jsonData = file_get_contents('php://input');
  $data = json_decode($jsonData, true);

  if (!$data || !isset($data['filename']) || !isset($data['formData'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid data received']);
    exit;
  }

  $filename = $data['filename'];
  $formData = $data['formData'];

  $filename = preg_replace('/[^a-zA-Z0-9._-]/', '', $filename);
  if (empty($filename)) {
    $filename = 'form_data_' . date('Y-m-d_H-i-s') . '.json';
  }

  $filepath = $uploadDir . $filename;

  if (file_put_contents($filepath, json_encode($formData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
    echo json_encode([
      'success' => true,
      'message' => 'File saved successfully',
      'filepath' => 'upload/' . $filename,
      'filename' => $filename
    ]);
  } else {
    echo json_encode(['success' => false, 'message' => 'Failed to save file. Check directory permissions.']);
  }
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BSP </title>
  <link href="/assets/css/profile/aur.css" rel="stylesheet" />
</head>

<body>
  <div class="page">
    <!-- Header -->
    <div class="header-top">
      <div class="bsp-id">
        <div class="bold">BSP FORM NO. 6-01</div>
        <div>(Revised 22 Nov. 2024)</div>
      </div>
      <div class="main-title">
        <img src="assets/images/BSP_logo.png" alt="BSP Logo" class="bsp-logo" />
        <div class="title-text">
          <h2>BOY SCOUTS OF THE PHILIPPINES</h2>
          <div class="address">181 Natividad Almeda-Lopez Street, Ermita, Manila 1000</div>
          <h3>APPLICATION FOR UNIT REGISTRATION (AUR)</h3>
        </div>
      </div>
      <div class="aur-flag">
        <span class="aur-text">AUR</span>
        <span class="aur-number">NO. <input type="text" id="aurNumber" /></span>
      </div>
      <div class="red-label">NO/RO/LC/SI</div>
    </div>

    <!-- Basic Information -->
    <div class="section small" style="padding: 0 2px">
      <table class="no-border" style="width: 100%">
        <tr>
          <td width="35%">Sponsoring Institution: <input type="text" id="sponsoringInstitution" style="width: 180px"
              placeholder="_________________" /></td>
          <td width="25%">Unit No.: <input type="text" id="unitNo" style="width: 60px" placeholder="___" /></td>
          <td width="25%">Local Council <input type="text" id="localCouncil" style="width: 70px" placeholder="______" />
          </td>
        </tr>
        <tr>
          <td>
            Unit:
            <span class="checkbox" id="unitLangkay" role="checkbox" aria-checked="false" tabindex="0"></span> Langkay
            <span class="checkbox" id="unitKawan" role="checkbox" aria-checked="false" tabindex="0"></span> Kawan
            <span class="checkbox" id="unitTroop" role="checkbox" aria-checked="false" tabindex="0"></span> Troop
            <span class="checkbox" id="unitOutfit" role="checkbox" aria-checked="false" tabindex="0"></span> Outfit
            <span class="checkbox" id="unitCircle" role="checkbox" aria-checked="false" tabindex="0"></span> Circle
          </td>
          <td>
            Nature:
            <span class="checkbox" id="natureSchool" role="checkbox" aria-checked="false" tabindex="0"></span>
            School-Based
            <span class="checkbox" id="natureCommunity" role="checkbox" aria-checked="false" tabindex="0"></span>
            Community-Based
          </td>
          <td>Date Applied: <input type="text" id="dateApplied" style="width: 70px" placeholder="______" /></td>
        </tr>
      </table>
    </div>

    <div class="adult-wrapper">
      <div class="adult-left">
        <table style="border-collapse: collapse; width: 100%" cellspacing="0">
          <tr class="gray center">
            <td width="40%">Position</td>
            <td width="40%">ADULT LEADERS<br />PRINT: Surname, Given Name, M.I.</td>
            <td width="20%">Signature</td>
          </tr>
          <tr>
            <td>Institutional Scouting Representative</td>
            <td><input type="text" id="isrName" style="width: 98%" /></td>
            <td><input type="text" id="isrSignature" style="width: 98%" /></td>
          </tr>
          <tr>
            <td>Unit Leader</td>
            <td><input type="text" id="unitLeaderName" style="width: 98%" /></td>
            <td><input type="text" id="unitLeaderSignature" style="width: 98%" /></td>
          </tr>
          <tr>
            <td>Asst. Unit Leader for Program</td>
            <td><input type="text" id="asstProgramName" style="width: 98%" /></td>
            <td><input type="text" id="asstProgramSignature" style="width: 98%" /></td>
          </tr>
          <tr>
            <td>Asst. Unit Leader for Administration</td>
            <td><input type="text" id="asstAdminName" style="width: 98%" /></td>
            <td><input type="text" id="asstAdminSignature" style="width: 98%" /></td>
          </tr>
        </table>
      </div>
      <div class="adult-right">
        <div>NOTE: All Adult Leaders must register using the Application for Adult Registration Form (AAR)</div>
        <br />
        <div>Registration Status: <b>N</b> – New <b>RR</b> – Reregistering</div>
      </div>
    </div>

    <!-- Roster of Scout Membership -->
    <div class="section">
      <table>
        <tr class="gray center">
          <td width="30%">ROSTER OF SCOUT MEMBERSHIP<br /><span class="small">Surname, Given Name, M.I.</span></td>
          <td width="10%">Registration Status</td>
          <td width="6%">Age</td>
          <td width="6%">Sex</td>
          <td width="14%">Membership Card No.</td>
          <td width="12%">Highest Rank Earned</td>
          <td width="12%">Number of years in Scouting</td>
        </tr>
        <tr>
          <td>SPL/SCL/RL: <input type="text" id="splName" style="width: 60%" /></td>
          <td><input type="text" id="splRegStatus" style="width: 60%" /></td>
          <td><input type="text" id="splAge" style="width: 60%" /></td>
          <td><input type="text" id="splSex" style="width: 60%" /></td>
          <td><input type="text" id="splCardNo" style="width: 60%" /></td>
          <td><input type="text" id="splRank" style="width: 60%" /></td>
          <td><input type="text" id="splYears" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>Assistant SPL/SCL/RL: <input type="text" id="asstSplName" style="width: 50%" /></td>
          <td><input type="text" id="asstSplRegStatus" style="width: 60%" /></td>
          <td><input type="text" id="asstSplAge" style="width: 60%" /></td>
          <td><input type="text" id="asstSplSex" style="width: 60%" /></td>
          <td><input type="text" id="asstSplCardNo" style="width: 60%" /></td>
          <td><input type="text" id="asstSplRank" style="width: 60%" /></td>
          <td><input type="text" id="asstSplYears" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>SCRIBE: <input type="text" id="scribeName" style="width: 60%" /></td>
          <td><input type="text" id="scribeRegStatus" style="width: 60%" /></td>
          <td><input type="text" id="scribeAge" style="width: 60%" /></td>
          <td><input type="text" id="scribeSex" style="width: 60%" /></td>
          <td><input type="text" id="scribeCardNo" style="width: 60%" /></td>
          <td><input type="text" id="scribeRank" style="width: 60%" /></td>
          <td><input type="text" id="scribeYears" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>TREASURER: <input type="text" id="treasurerName" style="width: 60%" /></td>
          <td><input type="text" id="treasurerRegStatus" style="width: 60%" /></td>
          <td><input type="text" id="treasurerAge" style="width: 60%" /></td>
          <td><input type="text" id="treasurerSex" style="width: 60%" /></td>
          <td><input type="text" id="treasurerCardNo" style="width: 60%" /></td>
          <td><input type="text" id="treasurerRank" style="width: 60%" /></td>
          <td><input type="text" id="treasurerYears" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>AUDITOR (For Rover Circles Only): <input type="text" id="auditorName" style="width: 30%" /></td>
          <td><input type="text" id="auditorRegStatus" style="width: 60%" /></td>
          <td><input type="text" id="auditorAge" style="width: 60%" /></td>
          <td><input type="text" id="auditorSex" style="width: 60%" /></td>
          <td><input type="text" id="auditorCardNo" style="width: 60%" /></td>
          <td><input type="text" id="auditorRank" style="width: 60%" /></td>
          <td><input type="text" id="auditorYears" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>QUARTERMASTER: <input type="text" id="qmName" style="width: 60%" /></td>
          <td><input type="text" id="qmRegStatus" style="width: 60%" /></td>
          <td><input type="text" id="qmAge" style="width: 60%" /></td>
          <td><input type="text" id="qmSex" style="width: 60%" /></td>
          <td><input type="text" id="qmCardNo" style="width: 60%" /></td>
          <td><input type="text" id="qmRank" style="width: 60%" /></td>
          <td><input type="text" id="qmYears" style="width: 60%" /></td>
        </tr>
      </table>
    </div>

    <!-- Roster 1 -->
    <div class="sections" id="roster1">
      <table>
        <tr>
          <td width="30%">1. <input type="text" id="roster1_1" style="width: 80%" /></td>
          <td width="10%"><input type="text" id="roster1_1_status" style="width: 60%" /></td>
          <td width="6%"><input type="text" id="roster1_1_age" style="width: 60%" /></td>
          <td width="6%"><input type="text" id="roster1_1_sex" style="width: 60%" /></td>
          <td width="14%"><input type="text" id="roster1_1_card" style="width: 60%" /></td>
          <td width="12%"><input type="text" id="roster1_1_rank" style="width: 60%" /></td>
          <td width="12%"><input type="text" id="roster1_1_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>2. <input type="text" id="roster1_2" style="width: 80%" /></td>
          <td><input type="text" id="roster1_2_status" style="width: 60%" /></td>
          <td><input type="text" id="roster1_2_age" style="width: 60%" /></td>
          <td><input type="text" id="roster1_2_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster1_2_card" style="width: 60%" /></td>
          <td><input type="text" id="roster1_2_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster1_2_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>3. <input type="text" id="roster1_3" style="width: 80%" /></td>
          <td><input type="text" id="roster1_3_status" style="width: 60%" /></td>
          <td><input type="text" id="roster1_3_age" style="width: 60%" /></td>
          <td><input type="text" id="roster1_3_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster1_3_card" style="width: 60%" /></td>
          <td><input type="text" id="roster1_3_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster1_3_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>4. <input type="text" id="roster1_4" style="width: 80%" /></td>
          <td><input type="text" id="roster1_4_status" style="width: 60%" /></td>
          <td><input type="text" id="roster1_4_age" style="width: 60%" /></td>
          <td><input type="text" id="roster1_4_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster1_4_card" style="width: 60%" /></td>
          <td><input type="text" id="roster1_4_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster1_4_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>5. <input type="text" id="roster1_5" style="width: 80%" /></td>
          <td><input type="text" id="roster1_5_status" style="width: 60%" /></td>
          <td><input type="text" id="roster1_5_age" style="width: 60%" /></td>
          <td><input type="text" id="roster1_5_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster1_5_card" style="width: 60%" /></td>
          <td><input type="text" id="roster1_5_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster1_5_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>6. <input type="text" id="roster1_6" style="width: 80%" /></td>
          <td><input type="text" id="roster1_6_status" style="width: 60%" /></td>
          <td><input type="text" id="roster1_6_age" style="width: 60%" /></td>
          <td><input type="text" id="roster1_6_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster1_6_card" style="width: 60%" /></td>
          <td><input type="text" id="roster1_6_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster1_6_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>7. <input type="text" id="roster1_7" style="width: 80%" /></td>
          <td><input type="text" id="roster1_7_status" style="width: 60%" /></td>
          <td><input type="text" id="roster1_7_age" style="width: 60%" /></td>
          <td><input type="text" id="roster1_7_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster1_7_card" style="width: 60%" /></td>
          <td><input type="text" id="roster1_7_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster1_7_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>8. <input type="text" id="roster1_8" style="width: 80%" /></td>
          <td><input type="text" id="roster1_8_status" style="width: 60%" /></td>
          <td><input type="text" id="roster1_8_age" style="width: 60%" /></td>
          <td><input type="text" id="roster1_8_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster1_8_card" style="width: 60%" /></td>
          <td><input type="text" id="roster1_8_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster1_8_years" style="width: 60%" /></td>
        </tr>
      </table>
    </div>

    <!-- Roster 2 -->
    <div class="sections" id="roster2">
      <table>
        <tr>
          <td>1. <input type="text" id="roster2_1" style="width: 80%" /></td>
          <td><input type="text" id="roster2_1_status" style="width: 60%" /></td>
          <td><input type="text" id="roster2_1_age" style="width: 60%" /></td>
          <td><input type="text" id="roster2_1_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster2_1_card" style="width: 60%" /></td>
          <td><input type="text" id="roster2_1_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster2_1_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>2. <input type="text" id="roster2_2" style="width: 80%" /></td>
          <td><input type="text" id="roster2_2_status" style="width: 60%" /></td>
          <td><input type="text" id="roster2_2_age" style="width: 60%" /></td>
          <td><input type="text" id="roster2_2_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster2_2_card" style="width: 60%" /></td>
          <td><input type="text" id="roster2_2_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster2_2_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>3. <input type="text" id="roster2_3" style="width: 80%" /></td>
          <td><input type="text" id="roster2_3_status" style="width: 60%" /></td>
          <td><input type="text" id="roster2_3_age" style="width: 60%" /></td>
          <td><input type="text" id="roster2_3_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster2_3_card" style="width: 60%" /></td>
          <td><input type="text" id="roster2_3_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster2_3_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>4. <input type="text" id="roster2_4" style="width: 80%" /></td>
          <td><input type="text" id="roster2_4_status" style="width: 60%" /></td>
          <td><input type="text" id="roster2_4_age" style="width: 60%" /></td>
          <td><input type="text" id="roster2_4_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster2_4_card" style="width: 60%" /></td>
          <td><input type="text" id="roster2_4_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster2_4_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>5. <input type="text" id="roster2_5" style="width: 80%" /></td>
          <td><input type="text" id="roster2_5_status" style="width: 60%" /></td>
          <td><input type="text" id="roster2_5_age" style="width: 60%" /></td>
          <td><input type="text" id="roster2_5_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster2_5_card" style="width: 60%" /></td>
          <td><input type="text" id="roster2_5_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster2_5_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>6. <input type="text" id="roster2_6" style="width: 80%" /></td>
          <td><input type="text" id="roster2_6_status" style="width: 60%" /></td>
          <td><input type="text" id="roster2_6_age" style="width: 60%" /></td>
          <td><input type="text" id="roster2_6_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster2_6_card" style="width: 60%" /></td>
          <td><input type="text" id="roster2_6_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster2_6_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>7. <input type="text" id="roster2_7" style="width: 80%" /></td>
          <td><input type="text" id="roster2_7_status" style="width: 60%" /></td>
          <td><input type="text" id="roster2_7_age" style="width: 60%" /></td>
          <td><input type="text" id="roster2_7_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster2_7_card" style="width: 60%" /></td>
          <td><input type="text" id="roster2_7_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster2_7_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>8. <input type="text" id="roster2_8" style="width: 80%" /></td>
          <td><input type="text" id="roster2_8_status" style="width: 60%" /></td>
          <td><input type="text" id="roster2_8_age" style="width: 60%" /></td>
          <td><input type="text" id="roster2_8_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster2_8_card" style="width: 60%" /></td>
          <td><input type="text" id="roster2_8_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster2_8_years" style="width: 60%" /></td>
        </tr>
      </table>
    </div>

    <!-- Roster 3 -->
    <div class="sections" id="roster3">
      <table>
        <tr>
          <td>1. <input type="text" id="roster3_1" style="width: 80%" /></td>
          <td><input type="text" id="roster3_1_status" style="width: 60%" /></td>
          <td><input type="text" id="roster3_1_age" style="width: 60%" /></td>
          <td><input type="text" id="roster3_1_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster3_1_card" style="width: 60%" /></td>
          <td><input type="text" id="roster3_1_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster3_1_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>2. <input type="text" id="roster3_2" style="width: 80%" /></td>
          <td><input type="text" id="roster3_2_status" style="width: 60%" /></td>
          <td><input type="text" id="roster3_2_age" style="width: 60%" /></td>
          <td><input type="text" id="roster3_2_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster3_2_card" style="width: 60%" /></td>
          <td><input type="text" id="roster3_2_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster3_2_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>3. <input type="text" id="roster3_3" style="width: 80%" /></td>
          <td><input type="text" id="roster3_3_status" style="width: 60%" /></td>
          <td><input type="text" id="roster3_3_age" style="width: 60%" /></td>
          <td><input type="text" id="roster3_3_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster3_3_card" style="width: 60%" /></td>
          <td><input type="text" id="roster3_3_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster3_3_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>4. <input type="text" id="roster3_4" style="width: 80%" /></td>
          <td><input type="text" id="roster3_4_status" style="width: 60%" /></td>
          <td><input type="text" id="roster3_4_age" style="width: 60%" /></td>
          <td><input type="text" id="roster3_4_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster3_4_card" style="width: 60%" /></td>
          <td><input type="text" id="roster3_4_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster3_4_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>5. <input type="text" id="roster3_5" style="width: 80%" /></td>
          <td><input type="text" id="roster3_5_status" style="width: 60%" /></td>
          <td><input type="text" id="roster3_5_age" style="width: 60%" /></td>
          <td><input type="text" id="roster3_5_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster3_5_card" style="width: 60%" /></td>
          <td><input type="text" id="roster3_5_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster3_5_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>6. <input type="text" id="roster3_6" style="width: 80%" /></td>
          <td><input type="text" id="roster3_6_status" style="width: 60%" /></td>
          <td><input type="text" id="roster3_6_age" style="width: 60%" /></td>
          <td><input type="text" id="roster3_6_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster3_6_card" style="width: 60%" /></td>
          <td><input type="text" id="roster3_6_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster3_6_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>7. <input type="text" id="roster3_7" style="width: 80%" /></td>
          <td><input type="text" id="roster3_7_status" style="width: 60%" /></td>
          <td><input type="text" id="roster3_7_age" style="width: 60%" /></td>
          <td><input type="text" id="roster3_7_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster3_7_card" style="width: 60%" /></td>
          <td><input type="text" id="roster3_7_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster3_7_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>8. <input type="text" id="roster3_8" style="width: 80%" /></td>
          <td><input type="text" id="roster3_8_status" style="width: 60%" /></td>
          <td><input type="text" id="roster3_8_age" style="width: 60%" /></td>
          <td><input type="text" id="roster3_8_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster3_8_card" style="width: 60%" /></td>
          <td><input type="text" id="roster3_8_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster3_8_years" style="width: 60%" /></td>
        </tr>
      </table>
    </div>

    <!-- Roster 4 -->
    <div class="sections" id="roster4">
      <table>
        <tr>
          <td>1. <input type="text" id="roster4_1" style="width: 80%" /></td>
          <td><input type="text" id="roster4_1_status" style="width: 60%" /></td>
          <td><input type="text" id="roster4_1_age" style="width: 60%" /></td>
          <td><input type="text" id="roster4_1_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster4_1_card" style="width: 60%" /></td>
          <td><input type="text" id="roster4_1_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster4_1_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>2. <input type="text" id="roster4_2" style="width: 80%" /></td>
          <td><input type="text" id="roster4_2_status" style="width: 60%" /></td>
          <td><input type="text" id="roster4_2_age" style="width: 60%" /></td>
          <td><input type="text" id="roster4_2_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster4_2_card" style="width: 60%" /></td>
          <td><input type="text" id="roster4_2_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster4_2_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>3. <input type="text" id="roster4_3" style="width: 80%" /></td>
          <td><input type="text" id="roster4_3_status" style="width: 60%" /></td>
          <td><input type="text" id="roster4_3_age" style="width: 60%" /></td>
          <td><input type="text" id="roster4_3_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster4_3_card" style="width: 60%" /></td>
          <td><input type="text" id="roster4_3_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster4_3_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>4. <input type="text" id="roster4_4" style="width: 80%" /></td>
          <td><input type="text" id="roster4_4_status" style="width: 60%" /></td>
          <td><input type="text" id="roster4_4_age" style="width: 60%" /></td>
          <td><input type="text" id="roster4_4_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster4_4_card" style="width: 60%" /></td>
          <td><input type="text" id="roster4_4_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster4_4_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>5. <input type="text" id="roster4_5" style="width: 80%" /></td>
          <td><input type="text" id="roster4_5_status" style="width: 60%" /></td>
          <td><input type="text" id="roster4_5_age" style="width: 60%" /></td>
          <td><input type="text" id="roster4_5_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster4_5_card" style="width: 60%" /></td>
          <td><input type="text" id="roster4_5_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster4_5_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>6. <input type="text" id="roster4_6" style="width: 80%" /></td>
          <td><input type="text" id="roster4_6_status" style="width: 60%" /></td>
          <td><input type="text" id="roster4_6_age" style="width: 60%" /></td>
          <td><input type="text" id="roster4_6_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster4_6_card" style="width: 60%" /></td>
          <td><input type="text" id="roster4_6_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster4_6_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>7. <input type="text" id="roster4_7" style="width: 80%" /></td>
          <td><input type="text" id="roster4_7_status" style="width: 60%" /></td>
          <td><input type="text" id="roster4_7_age" style="width: 60%" /></td>
          <td><input type="text" id="roster4_7_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster4_7_card" style="width: 60%" /></td>
          <td><input type="text" id="roster4_7_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster4_7_years" style="width: 60%" /></td>
        </tr>
        <tr>
          <td>8. <input type="text" id="roster4_8" style="width: 80%" /></td>
          <td><input type="text" id="roster4_8_status" style="width: 60%" /></td>
          <td><input type="text" id="roster4_8_age" style="width: 60%" /></td>
          <td><input type="text" id="roster4_8_sex" style="width: 60%" /></td>
          <td><input type="text" id="roster4_8_card" style="width: 60%" /></td>
          <td><input type="text" id="roster4_8_rank" style="width: 60%" /></td>
          <td><input type="text" id="roster4_8_years" style="width: 60%" /></td>
        </tr>
      </table>
    </div>

    <!-- OFFICE ACTION -->
    <div class="office-wrapper">
      <div class="registration-fees">
        <h3>REGISTRATION FEES</h3>
        <div class="fees-row header"><span></span><span>RATE</span><span>AMOUNT</span></div>
        <div class="fees-row"><span>Total Number of Scouts:</span><span>50.00</span><span><input type="text"
              id="totalScouts" /></span></div>
        <div class="fees-row"><span>Institutional Charter Fee:</span><span>10.00</span><span><input type="text"
              id="charterFee" /></span></div>
        <div class="total-fee">TOTAL Fees Remitted ₱ <input type="text" id="totalFees" /></div>
        <div class="fees-bottom">
          <div>Paid Under OR. No.: <input type="text" id="orNumber" /></div>
          <div>Date: <input type="text" id="orDate" /></div>
        </div>
        <div>Expiration Date: <input style="border: none; border-bottom: 1px solid #000; width: 100px" type="text"
            id="expirationDate" /></div>
      </div>
      <div class="office-actions">
        <div class="local-office">
          <h3>LOCAL COUNCIL OFFICE ACTION</h3>
          <div class="action-row">Processed: <input type="text" id="processedBy" /> <span>Date</span><input type="text"
              id="processedDate" /></div>
          <div class="action-label">Registration Officer</div>
          <div class="action-row">Approved: <input type="text" id="approvedBy" /> <span>Date</span><input type="text"
              id="approvedDate" /></div>
          <div class="action-label">Council Scout Executive</div>
        </div>
        <div class="regional-office">
          <h3>REGIONAL OFFICE ACTION</h3>
          <div class="action-row">Checked: <input type="text" id="checkedBy" /> <span>Date</span><input type="text"
              id="checkedDate" /></div>
          <div class="action-label">Registration Officer</div>
        </div>
      </div>
    </div>

    <!-- PRIVACY -->
    <div class="privacy-section">
      <div class="privacy-text">The Boy Scouts of the Philippines adheres to the general rules and principles of RA
        10173, also known as the DataPrivacy Act of 2012. By filling-out and affixing your signature to this form, you
        consent to collecting and using data such as your photo, video, and personal information. Rest assured that your
        information will be treated with the utmost respect and confidentiality.</div>
      <div class="tagalog-text">(Sumusunod ang Boy Scouts ofthe Philippines sa mga pangkalahatang tuntunin at prinsipyo
        ng RA 10173, na kilala rin bilang Data Privacy Act of 2012. Sa pagsagot at pagpirma sa formna ito, pumapayag
        kang makolekta at gumamit ang iyong data tulad ng iyong larawan, video, at personal na impormasyon. Makatitiyak
        na ang iyong impormasyon ay ituturing naming may lubos na paggalang at kumpidensyal.)</div>
      <div class="contact-text">If youdisagree with using your data, you may contact us at our email (bsp@scouts.gov.ph)
        or number ((632)8572 8317 to19).</div>
      <div class="tagalog-text" style="margin-top: 2px">(Kapag ikaw ay hindi-sang-ayon na gamitin ang iyong data,
        ipagbigay alamsa amin sa pamamagitan ng email sa bsp@scouts.gov.ph o tumawag sa numero ng telopno sa (632) 8572
        8317 to 19).</div>
    </div>

    <!-- Save Button and Status -->
    <div style="text-align: center; margin-top: 15px; margin-bottom: 5px;">
      <button id="saveFormBtn" class="save-button">Submit</button>
      <div id="saveMessage" class="status-message"></div>
    </div>
  </div>

  <script>
    (function () {

      const checkboxes = document.querySelectorAll(".checkbox");
      checkboxes.forEach((cb) => {
        cb.addEventListener("click", function (e) {
          e.stopPropagation();
          this.classList.toggle("checked");
          const isChecked = this.classList.contains("checked");
          this.setAttribute("aria-checked", isChecked);
        });
        cb.addEventListener("keydown", function (e) {
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            this.click();
          }
        });
        cb.setAttribute("aria-checked", "false");
        cb.setAttribute("tabindex", "0");
      });

      document.getElementById('saveFormBtn').addEventListener('click', function () {
        const saveBtn = this;
        const msgEl = document.getElementById('saveMessage');

        const aurNumber = document.getElementById('aurNumber').value.trim();

        if (!aurNumber) {
          msgEl.className = 'status-message status-error';
          msgEl.textContent = '✗ AUR Number is required before saving!';

          document.getElementById('aurNumber').style.border = '2px solid red';
          document.getElementById('aurNumber').focus();

          setTimeout(() => {
            document.getElementById('aurNumber').style.border = '';
          }, 3000);

          return;
        }

        document.getElementById('aurNumber').style.border = '';

        saveBtn.disabled = true;
        saveBtn.textContent = 'SAVING...';
        msgEl.className = 'status-message status-info';
        msgEl.textContent = 'Saving form data...';

        const inputs = document.querySelectorAll('input[type="text"]');
        const checkboxes = document.querySelectorAll('.checkbox');

        const formData = {};

        inputs.forEach(input => {
          if (input.id) {
            formData[input.id] = input.value;
          }
        });

        checkboxes.forEach((cb, index) => {
          if (cb.id) {
            formData[cb.id] = cb.classList.contains('checked');
          } else {
            formData[`checkbox_${index}`] = cb.classList.contains('checked');
          }
        });

        // Add metadata
        formData['saved_at'] = new Date().toLocaleString();
        formData['form_version'] = '1.0';

        // Generate filename using validated AUR number
        const sanitizedAur = aurNumber.replace(/[^a-z0-9]/gi, '_').substring(0, 50);

        const filename = sanitizedAur + '.json';

        // Send to server
        fetch(window.location.href, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            filename: filename,
            formData: formData
          })
        })
          .then(response => response.json())
          .then(result => {
            if (result.success) {
              msgEl.className = 'status-message status-success';
              msgEl.innerHTML = `✓ File saved successfully! Redirecting to table view...`;


              sessionStorage.setItem('lastSavedFile', result.filename);
              sessionStorage.setItem('lastSavedPath', result.filepath);

              setTimeout(() => {
                window.location.href = '/aur-table';
              }, 1000);
            } else {
              msgEl.className = 'status-message status-error';
              msgEl.textContent = '✗ Error: ' + result.message;
              saveBtn.disabled = false;
              saveBtn.textContent = 'SAVE FORM DATA';
            }
          })
          .catch(error => {
            msgEl.className = 'status-message status-error';
            msgEl.textContent = '✗ Connection error: ' + error.message;
            saveBtn.disabled = false;
            saveBtn.textContent = 'SAVE FORM DATA';
          });
      });
    })();
  </script>
</body>

</html>