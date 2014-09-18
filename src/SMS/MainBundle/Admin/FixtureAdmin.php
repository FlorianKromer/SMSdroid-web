<?php
namespace SMS\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FixtureAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('date', 'date', array('label' => 'Date'))
            ->add('teamA', 'entity', array('class' => 'SMS\MainBundle\Entity\Team'))
            ->add('teamB', 'entity', array('class' => 'SMS\MainBundle\Entity\Team'))
            ->add('scoreB', 'integer', array('label' => 'Score TeamA'))
            ->add('scoreA', 'integer', array('label' => 'Score TeamB'))
            ->add('day', 'entity', array('class' => 'SMS\MainBundle\Entity\Days'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('date')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('date')
        ;
    }
}