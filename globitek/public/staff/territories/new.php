<?php
require_once('../../../private/initialize.php');

// Set default values for all variables the page needs.
$errors = array();
$state_id = $_GET['state_id'];
$territory = array(
  'name' => '',
  'state_id' => $state_id,
  'position' => ''
);

if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $territory['name'] = $_POST['name']; }
  if(isset($_POST['position'])) { $territory['position'] = $_POST['position']; }

  $result = insert_territory($territory);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show?id=<?php echo urlencode($state_id)?>">Back to State Details</a><br />

  <h1>New Territory</h1>

  <form action="new.php" method="post">
    Territory Name:<br />
    <input type="text" name="name" value="<?php echo $territory['name']; ?>" /><br />
    <br />
    Territory Position:<br />
    <input type="text" name="position" value="<?php echo $territory['position']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
