<?php
namespace SMS\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PlayerAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('firstname', 'text', array('label' => 'Prénom'))
            ->add('lastname', 'text', array('label' => 'Nom'))
            ->add('goal', 'integer', array('label' => 'Nombre de but'))
            ->add('team', 'entity', array('class' => 'SMS\MainBundle\Entity\Team','required'=>false))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstname')
            ->add('lastname')
            ->add('team')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('firstname')
            ->addIdentifier('lastname')
            ->addIdentifier('team')
        ;
    }
}