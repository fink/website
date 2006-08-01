<?

# $releases:ordered map of $os=>$os_distro_data
#   $os: displayed label
#   $os_distro_data: map of information about packages in $os
#     "bin"=>$bindists
#       $bindists: ordered map of $bindist=>$bin_sql
#         $bindist: displayed label
#         $bin_sql: "release" SQL value for $bindist binary (apt) distro
#     "sta"=>$sta_sql
#       $sta_sql: "release" SQL value for stable source distro
#     "uns"=>$uns_sql
#       $uns_sql: "release" SQL value for unstable source distro
#     "pri"=>$priority
#       $priority: integer priority code used for organizing the display
#         (lower positive number==higher priority)
#
# $releases must be an array with at least one entry
# $os_distro_data must be an array, but each entry in it is optional

$releases = array(
	"10.4/intel" => array(
			"bin"=>array("bindist 0.8.1"=>"0.8.1-i386-stable"),
			"sta"=>"current-10.4-i386-stable",
			"uns"=>"current-10.4-i386-unstable",
			"pri"=>1,
			),
	"10.4/powerpc" => array(
			"bin"=>array("bindist 0.8.1"=>"0.8.1-powerpc-stable"),
			"sta"=>"current-10.4-powerpc-stable",
			"uns"=>"current-10.4-powerpc-unstable",
			"pri"=>2,
			),
	"10.3" => array(
			"bin"=>array("bindist 0.7.2"=>"0.7.2-stable"),
			"sta"=>"current-10.3-stable",
			"uns"=>"current-10.3-unstable",
			"pri"=>3,
			),
	"10.2<br>(gcc3.3 only)" => array(
			"bin"=>array("bindist 0.6.4"=>"0.6.4-stable"),
			"sta"=>"current-10.2-gcc3.3-stable",
			"uns"=>"current-10.2-gcc3.3-unstable",
			"pri"=>3,
			),
	"10.1" => array(
			"bin"=>array("bindist 0.4.1"=>"0.4.1-stable"),
			"pri"=>3,
			)
);
?>
