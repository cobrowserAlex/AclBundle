<?php

/*
 * This file is part of the ProjectA AclBundle.
 *
 * (c) Daniel Tschinder
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ProjectA\Bundle\AclBundle\Security\Acl\Manager\AceManager;

use Symfony\Component\Security\Acl\Model\SecurityIdentityInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author Daniel Tschinder <daniel@tschinder.de>
 */
interface AceManagerInterface
{
    /**
     * Grant a permission to the identity for an object
     *
     * @param object                                                                      $object
     * @param int                                                                         $mask
     * @param string|TokenInterface|RoleInterface|UserInterface|SecurityIdentityInterface $identity
     * @param string                                                                      $field
     * @param string                                                                      $strategy
     *
     * @return self
     */
    public function grant($object, $mask, $identity, $field = null, $strategy = null);

    /**
     * Revoke a granted permission from the identity for the object
     *
     * @param object                                                                      $object
     * @param int                                                                         $mask
     * @param string|TokenInterface|RoleInterface|UserInterface|SecurityIdentityInterface $identity
     * @param string                                                                      $field
     *
     * @return self
     */
    public function revoke($object, $mask, $identity, $field = null);

    /**
     * Revoke all granted permissions from the identity
     *
     * @param object                                                                      $object
     * @param string|TokenInterface|RoleInterface|UserInterface|SecurityIdentityInterface $identity
     * @param string                                                                      $field
     *
     * @return self
     */
    public function revokeAllForIdentity($object, $identity, $field = null);

    /**
     * Revoke all granted permissions for an object
     *
     * @param object $object
     * @param string $field
     *
     * @return self
     */
    public function revokeAll($object, $field = null);

    /**
     * Delete the complete acl for an object
     *
     * All AccessControlEntries and the ObjectIdentity for an object
     * are deleted from storage
     *
     * @param object $object
     *
     * @return self
     */
    public function deleteAcl($object);

    /**
     * Preload Acls for all the objects
     *
     * This will create batch queries instead of single queries for the acls
     *
     * @param object[] $objects
     *
     * @return self
     */
    public function preload($objects);
}
