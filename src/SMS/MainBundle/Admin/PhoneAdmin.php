<?php
namespace SMS\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PhoneAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('number', 'text', array('label' => 'Number'))
            ->add('user',  'sonata_type_model_list', array(
                    'label'=>'user',
                    'btn_delete'    => false,
                    'class' => 'Application\Sonata\UserBundle\Entity\User',
                    'required' => false)
                )
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('user')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('number')
            ->addIdentifier('user')
        ;
    }
}