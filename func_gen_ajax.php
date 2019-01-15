<?php
    session_start();
    include('func_gen_php.php');
    include('func_gen_sql.php');
    include('func_movie_php.php');
    include('func_movie_sql.php');

    if (isset($_POST['search'])) {
        $input = $_POST['search'];
        $inputSecure = pgSecureCheck($input);

        $movieSearch = smSearchMovie($inputSecure);
        if ($movieSearch <> 'KO') {
            foreach ($movieSearch as $movie) {
                $movieLink = 'movie.php?movie=' . pgEncodeDecode($movie['id'] . 'movie', 1);
                ?>
                <li onclick='fill("<?php echo pmSubStrYear($movie['title']); ?>")'>
                    <a href="<?php echo $movieLink ?>"><?php echo pmSubStrYear($movie['title']) ?></a></li>
                <?php
            }
        }
    }
?>