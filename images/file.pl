#!/usr/bin/perl

# URL that generated this code:
# http://txt2re.com/index.php3?s=http://www.website-2000.com/asdsa/adas/assd.jpg&5

$txt='http://ia.media-imdb.com/images/M/MV5BOTg5ODM5ODY0OF5BMl5BanBnXkFtZTcwNjA2NDAyMQ@@._V1_SX300.jpg';

$re1='.*?';	# Non-greedy match on filler
$re2='((?:[a-z][a-z\\.\\d_]+)\\.(?:[a-z\\d]{3}))(?![\\w\\.])';	# File Name 1

$re=$re1.$re2;
if ($txt =~ m/$re/is)
{
    $file1=$1;
    print "($file1) \n";
}

