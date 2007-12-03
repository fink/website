<?php

class Package {
	protected $name;
	protected $version;
	protected $revision;
	protected $epoch;

	protected $description;
	protected $descdetail;
	protected $descusage;

	protected $homepage;
	protected $license;
	protected $maintainer;

	protected $section;
	protected $parent;
	protected $rcspath;
	protected $tag;
	protected $infofile;
	protected $time;

	public function __construct($name, $version = NULL, $revision = NULL, $epoch = 0) {
		$this->name     = $name;
		$this->version  = $version;
		$this->revision = $revision;
		$this->epoch    = $epoch;
	}

	public function getId() {
		$id = $this->name;
		if (!empty($this->epoch))   { $id .= '-' . $this->epoch; };
		if (isset($this->version))  {
			if (!empty($this->epoch)) {
				$id .= ':' . $this->version;
			} else {
				$id .= '-' . $this->version;
			}
		}
		if (isset($this->revision)) { $id .= '-' . $this->revision; };
		return $id;
	}

	public function getName()                  { return $this->name; }
	public function getVersion()               { return $this->version; }
	public function setVersion($version)       { $this->version = $version; }
	public function getRevision()              { return $this->revision; }
	public function setRevision($rev)          { $this->revision = $rev; }
	public function getEpoch()                 { return $this->epoch; }
	public function setEpoch($epoch)           { $this->epoch = $epoch; }

	public function getDescription()           { return $this->description; }
	public function setDescription($desc)      { $this->description = $desc; }
	public function getDescDetail()            { return $this->descdetail; }
	public function setDescDetail($detail)     { $this->descdetail = $detail; }
	public function getDescUsage()             { return $this->descusage; }
	public function setDescUsage($usage)       { $this->descusage = $usage; }

	public function getHomepage()              { return $this->homepage; }
	public function setHomepage($homepage)     { $this->homepage = $homepage; }
	public function getLicense()               { return $this->license; }
	public function setLicense($license)       { $this->license = $license; }
	public function getMaintainer()            { return $this->maintainer; }
	public function setMaintainer($maintainer) { $this->maintainer = $maintainer; }

	public function getSection()               { return $this->section; }
	public function setSection($section)       { $this->section = $section; }
	public function getRcsPath()               { return $this->rcspath; }
	public function setRcsPath($rcspath)       { $this->rcspath = $rcspath; }
	public function getTag()                   { return $this->tag; }
	public function setTag($tag)               { $this->tag = $tag; }
	public function getParent()                { return $this->parent; }
	public function setParent($parent)         { $this->parent = $parent; }
	public function getInfoFile()              { return $this->infofile; }
	public function setInfoFile($file)         { $this->infofile = $file; }
	public function getTime()                  { return $this->time; }
	public function setTime($time)             { $this->time = $time; }

	public function __toString() {
		return $this->getId();
	}
}

class Distribution {
	protected $name;
	protected $architecture;
	protected $description;
	protected $rcspath;
	protected $priority = 0;
	protected $isActive = TRUE;
	protected $isVisible = TRUE;
	protected $isSupported = FALSE;

	public function __construct($name, $architecture, $description = NULL, $rcspath = NULL, $priority = 0, $isActive = TRUE, $isVisible = TRUE, $isSupported = FALSE) {
		$this->name         = $name;
		$this->architecture = $architecture;
		$this->description  = isset($description)? $description : $name;
		$this->rcspath      = $rcspath;
		$this->priority     = $priority;
		$this->isActive     = $isActive;
		$this->isVisible    = $isVisible;
		$this->isSupported  = $isSupported;
	}

	public function getId() {
		$id = $this->name;
		if (isset($this->architecture)) { $id .= '-' . $this->architecture; };
		return $id;
	}

	public function getName()              { return $this->name; }
	public function setName($name)         { $this->name = $name; }
	public function getArchitecture()      { return $this->architecture; }
	public function setArchitecture($arch) { $this->architecture = $arch; }
	public function getDescription()       { return $this->description; }
	public function setDescription($desc)  { $this->description = $desc; }
	public function getRcsPath()           { return $this->rcspath; }
	public function setRcsPath($path)      { $this->rcspath = $path; }

	public function getPriority()          { return $this->priority; }
	public function setPriority($prio)     { $this->priority = $prio; }
	public function isActive()             { return $this->isActive; }
	public function setActive($boolean)    { $this->isActive = $boolean; }
	public function isVisible()            { return $this->isVisible; }
	public function setVisible($boolean)   { $this->isVisible = $boolean; }
	public function isSupported()          { return $this->isSupported; }
	public function setSupported($boolean) { $this->isSupported = $boolean; }

	public function __toString() {
		return $this->getId();
	}
}

class Release {
	protected $distribution;
	protected $type;
	protected $version;
	protected $priority = 0;
	protected $isActive = TRUE;

	public function __construct($distribution, $type, $version, $priority = 0, $isActive = TRUE) {
		$this->distribution = $distribution;
		$this->type         = $type;
		$this->version      = $version;
		$this->priority     = $priority;
		$this->isActive     = $isActive;
	}

	public function getId() {
		$id = $this->distribution->getId() . '-' . $this->version . '-' . $this->type;
		return $id;
	}

	public function getDistribution()      { return $this->distribution; }
	public function setDistribution($dist) { $this->distribution = $dist; }
	public function getType()              { return $this->type; }
	public function setType($type)         { $this->type = $type; }
	public function getVersion()           { return $this->version; }
	public function setVersion($version)   { $this->version = $version; }
	public function getPriority()          { return $this->priority; }
	public function setPriority($prio)     { $this->priority = $prio; }
	public function isActive()             { return $this->isActive; }
	public function setActive($boolean)    { $this->isActive = $boolean; }

	public function __toString() {
		return $this->getId();
	}
}

class PackageRelease {
	protected $package;
	protected $release;

	public function __construct($release, $package) {
		$this->release = $release;
		$this->package = $package;
	}

	public function getId() {
		return $this->release->getId() . '-' . $this->package->getId();
	}

	public function __toString() {
		return $this->getId();
	}
}

?>
