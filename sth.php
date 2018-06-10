<?php

include_once 'mh.php';

?>

<section class="mainkontener" style="margin-left: 30%;">
<?php

$compartment = $_SESSION['userid'];

$files = glob("uploads/$compartment*.*"); // filenames starting with user's session id

// Process through each file in the list
// and output its extension
if (count($files) > 0)
foreach ($files as $file)
 {
    $info = pathinfo($file);

    ?> </br> <a href="uploads/<?php echo $file;?>"><?php echo $file ?></a> <?php
 }
 else
  echo "No file exists for user id: $compartment. Sorry :/."
  ?>
</secion>
<?php
include_once 'footer.php';
?>
