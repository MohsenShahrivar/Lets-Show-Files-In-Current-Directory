<?php 
// Get file list in current directory with their address 
// author : Mohsen Shahrivar

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en/US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File List in This Directory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>

    </style>
</head>
<body>
    

<?php 
if ($handle = opendir('.')) { ?>

    <div class='file-contianer vw-100 vh-100 bg-light'>
        <div class="table-container p-3 p-lg-4 bg-dark">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Download</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                while (false !== ($entry = readdir($handle))) :
                    
                    if ($entry != "." && $entry != ".." && $entry != 'index.php') : ?>
                        
                        <tr class="">
                            <th>
                                <?php echo "<a href='" . $actual_link . $entry . "' target='_blank'>" . $entry . "</a>"; ?>
                            </th>
                            <th>
                                <?php echo "<a href='" . $actual_link . $entry . "' download> Download Now </a>"; ?>
                            </th>
                        </tr>

                    <?php endif;
                endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>

    <?php
    closedir($handle);
}
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
