<?php

namespace App\Domain\Entities;


use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\ACL\Contracts\Role as RoleContract;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Permissions\HasPermissions;

/**
 * @ORM\Entity()
 */
class Role implements RoleContract
{
  use Timestamps, HasPermissions;

  /**
   * @ORM\Id()
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @var int
   */
  protected $id;

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  protected $name;


  /**
   * @ACL\HasPermissions
   */
  public $permissions;

  /**
   * @param string $name
   */
  public function __construct($name)
  {
    $this->name = $name;
  }

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return ArrayCollection|Permission[]
   */
  public function getPermissions()
  {

    return $this->permissions;
  }

  /**
   * @param string $permission
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
}
