<?php
/*
 * index.php created on 08.09.2008 by ol@axxeo.de
 * iconset from: <http://www.pixelgraphix.de/weblog/artikel/iconset-clean-in-16x16-und-32x32-pixel-zum-mitnehmen/>
 *
 * @author: ol@axxeo.de
 * @copyright: axxeo GmbH
 *
 *
 * TODO
 *
 * 08.09.08: init
 * 09.09.09: icons added, html finished
 * 10.09.09: several fixes, restructuration, moved logging
 * 10.09.09: enabled mime-check
 * 10.09.09: cleanup
 *
 */

/*
 * TUNABLES:
 */

$filename = "big-download-file.iso";
define('BASE_DIR','/var/home/ol/public_html');


define('LOG_DOWNLOADS',true); // log downloads?  true/false
define('LOG_FILE','downloads.log'); // log file name
// looks like:
// m.d.Y g:ia#192.168.1.1#/var/www/downloads/big_iso_download.iso#Lastname#Last-Company inc.

define('LOG_CONTACTDATA',true); // log contact-data?  true/false
define('CONTACTDATA_LOG_FILE','contactdata.log'); // log file name
// looks like:
// m.d.Y g:ia#192.168.1.1#/var/www/downloads/big_iso_download.iso#Mr.#Firstname#Lastname#first.last@example.com#Last-Company inc.#+4900000000#+49111111#www.example.com#CEO/Sales-Manager#30000#BigCity#Oceania


/*
 * DO NOT EDIT BELOW!
 */

include ('include.inc.php');

if (!isset($_POST["titlereq"]) ||
 !isset($_POST["firstnamereq"]) ||
 !isset($_POST["lastnamereq"]) ||
 !isset($_POST["emailreq"]) ||
 !isset($_POST["compnamereq"]) ||
 !isset($_POST["comptelreq"]) ||
 !isset($_POST["compstreetreq"]) ||
 !isset($_POST["compzipreq"]) ||
 !isset($_POST["compcityreq"]) ||
 !isset($_POST["compcountryreq"]) ||
 !isset($_POST["submitted"]))
{
  htmlheader();
  echo '    <h1>Downloadform</h1>
      <p>Fields marked <strong title="Required" class="required">*</strong> are required for submission</p>
      <form action="' . $_SERVER[PHP_SELF] . '" method="post">
        <fieldset>
          <legend id="personal">Personal Details</legend>

          <label for="titlereq">Title <strong title="Required" class="required">*</strong></label> :
            <select id="titlereq" name="titlereq">
              <option value=""></option>
              <option value="Mr.">Mr.</option>
              <option value="Mrs.">Mrs.</option>
            </select>

          <label for="firstnamereq">First Name <strong title="Required" class="required">*</strong></label> :
            <input type="text" id="firstnamereq" name="firstnamereq" value="" />

          <label for="lastnamereq">Last Name <strong title="Required" class="required">*</strong></label> :
            <input type="text" id="lastnamereq" name="lastnamereq" value="" />

          <label for="emailreq">E-Mail-Address <strong title="Required" class="required">*</strong></label> :
            <input type="text" id="emailreq" name="emailreq" value="" />
        </fieldset>


        <fieldset>
          <legend id="company">Company Details</legend>

          <label for="compnamereq">Company Name <strong title="Required" class="required">*</strong></label> :
            <input type="text" id="compnamereq" name="compnamereq" value="" />

          <label for="comptelreq">Phone Number <strong title="Required" class="required">*</strong></label> :
            <input type="text" id="comptelreq" name="comptelreq" value="" />

          <label for="compfaxreq">FAX Number</label> :
            <input type="text" id="compfax" name="compfax" value="" />

          <label for="compwebadd">Website</label> :
            <input type="text" id="compwebadd" name="compwebadd" value="" />

          <label for="compposi">Position in the Company</label> :
            <input type="text" id="compposi" name="compposi" value="" />

            <fieldset>
              <legend id="compaddr">Company Address</legend>
              <label for="compstreetreq">Street, Street Number <strong title="Required" class="required">*</strong></label> :
                <input type="text" id="compstreetreq" name="compstreetreq" value="" />
              <label for="compzipreq">Zipcode <strong title="Required" class="required">*</strong></label> :
                <input type="text" id="compzipreq" name="compzipreq" value="" />
              <label for="compcityreq">City <strong title="Required" class="required">*</strong></label> :
                <input type="text" id="compcityreq" name="compcityreq" value="" />
              <label for="compcountryreq">Country <strong title="Required" class="required">*</strong></label> :
                <input type="text" id="compcountryreq" name="compcountryreq" value="" />
            </fieldset>
        </fieldset>
        <input type="hidden" name="submitted" value="true" /><br />
        <input id="submitbutton" type="submit" value="Download!" />
      </form>

  ';
  htmlfooter();
}
elseif (empty($_POST["titlereq"]) ||
      empty($_POST["firstnamereq"]) ||
      empty($_POST["lastnamereq"]) ||
      empty($_POST["emailreq"]) ||
      empty($_POST["compnamereq"]) ||
      empty($_POST["comptelreq"]) ||
      empty($_POST["compstreetreq"]) ||
      empty($_POST["compzipreq"]) ||
      empty($_POST["compcityreq"]) ||
      empty($_POST["compcountryreq"]))
 {
  htmlheader();
  echo '
      <p>Fields marked <strong title="Required" class="required">*</strong> are required for submission.<br />
      Please fill them all out to continue to the download.</p>';
  htmlfooter();
 }

else
{
  // check existance of file
  $file_dir = BASE_DIR;
  $file_path = BASE_DIR . "/$filename";
  if (!is_file($file_path)) {
    die("      <p><strong>File does not exist. Make sure you specified correct file name.</strong></p>");
  }



  // log downloads
  if (LOG_DOWNLOADS)
  {
    $f = @fopen(LOG_FILE, 'a');
    if (!$f)
    {
      die("      <p><strong>Download-Logfile is not writable. Make sure you specified correct file name.</strong></p>");
    }
    else
    {
      if (fwrite($f, date("m.d.Y g:ia")."#".$_SERVER['REMOTE_ADDR']."#".
        $file_path."#".
        $_POST["lastnamereq"]."#".
        $_POST["compnamereq"]."\n") == FALSE)
      {
        echo 'Cannot write to file ('.LOG_FILE.')';
        exit;
      }
    }
    @fclose($f);
  }


  if (LOG_CONTACTDATA)
  {
    $f2 = @fopen(CONTACTDATA_LOG_FILE, 'a');
    if (!$f2)
    {
      die("      <p><strong>Contactdata-Logfile is not writable. Make sure you specified correct file name.</strong></p>");
    }
    else
    {
      if  (fwrite($f2, date("m.d.Y g:ia")."#".
        $_SERVER['REMOTE_ADDR']."#".
        $file_path."#".
        $_POST["titlereq"]."#".
        $_POST["firstnamereq"]."#".
        $_POST["lastnamereq"]."#".
        $_POST["emailreq"]."#".
        $_POST["compnamereq"]."#".
        $_POST["comptelreq"]."#".
        $_POST["compfax"]."#".
        $_POST["compwebadd"]."#".
        $_POST["compposi"]."#".
        $_POST["compstreetreq"]."#".
        $_POST["compzipreq"]."#".
        $_POST["compcityreq"]."#".
        $_POST["compcountryreq"]."\n") == FALSE)
      {
        echo 'Cannot write to file ('.LOG_FILE.')';
        exit;
      }
      @fclose($f);
    }
  }

  // get mime-type
  $getmime = "/usr/bin/file -i -b $file_path";
  $setmime = exec($getmime,$mtype,$mimeexit);
  ($mimeexit == 0) or die("returned an error: $setmime");

  if (empty($mtype)) {
    $mtype = "application/force-download";
  }

  // set http-headers
  header("Pragma: public");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Type: $mtype");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Transfer-Encoding: binary");
  header("Content-Length: " . filesize($file_path));

  // download
  // @readfile($file_path);
  $file = @fopen($file_path,"rb");
  if ($file) {
    while(!feof($file)) {
      print(fread($file, 1024*8));
      flush();
      if (connection_status()!=0) {
        @fclose($file);
        die();
      }
    }
    @fclose($file);
  }
}

?>
