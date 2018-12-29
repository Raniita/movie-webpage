open FILE, "<u.movie2";
while (<FILE>) {
#print $_;
@f=split('\t',$_);
if ($f[4] =~ /http/) {
system ("wget $f[4]");
}
}
close FILE;
