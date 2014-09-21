<?php
namespace Application\Sonata\UserBundle\Admin\Model;
 
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\UserBundle\Admin\Model\UserAdmin as UserAdmin;
use SMS\MainBundle\Admin\PhoneAdmin;

class ApplicationUserAdmin extends UserAdmin
{
 
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('groups')
            ->add('enabled', null, array('editable' => true))
            ->add('locked', null, array('editable' => true))
            ->add('createdAt')
        ;
 
        /*if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            $listMapper
                ->add('impersonating', 'string', array('template' => 'SonataUserBundle:Admin:Field/impersonating.html.twig'))
            ;
        }*/
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('User')
                ->with('Profile', array('class' => 'col-md-6'))->end()
                ->with('General', array('class' => 'col-md-6'))->end()
                ->with('Social', array('class' => 'col-md-6'))->end()
            ->end()
            ->tab('Security')
                ->with('Status', array('class' => 'col-md-4'))->end()
                ->with('Groups', array('class' => 'col-md-4'))->end()
                ->with('Keys', array('class' => 'col-md-4'))->end()
                ->with('Roles', array('class' => 'col-md-12'))->end()
            ->end()
            ->tab('SMSdroid')
                ->with('Informations', array('class'=>'col-md-12'))->end()
            ->end()
        ;

        $now = new \DateTime();

        $formMapper
            ->tab('User')
                ->with('General')
                    ->add('username')
                    ->add('email')
                    ->add('plainPassword', 'text', array(
                        'required' => (!$this->getSubject() || is_null($this->getSubject()->getId()))
                    ))
                ->end()
                ->with('Profile')
                    ->add('dateOfBirth', 'sonata_type_date_picker', array(
                        'years' => range(1900, $now->format('Y')),
                        'dp_min_date' => '1-1-1900',
                        'dp_max_date' => $now->format('c'),
                        'required' => false
                    ))
                    ->add('firstname', null, array('required' => false))
                    ->add('lastname', null, array('required' => false))
                    ->add('website', 'url', array('required' => false))
                    ->add('biography', 'text', array('required' => false))
                    ->add('gender', 'sonata_user_gender', array(
                        'required' => true,
                        'translation_domain' => $this->getTranslationDomain()
                    ))
                    ->add('locale', 'locale', array('required' => false))
                    ->add('timezone', 'timezone', array('required' => false))
                    ->add('phone', null, array('required' => false))
                ->end()
                ->with('Social')
                    ->add('facebookUid', null, array('required' => false))
                    ->add('facebookName', null, array('required' => false))
                    ->add('twitterUid', null, array('required' => false))
                    ->add('twitterName', null, array('required' => false))
                    ->add('gplusUid', null, array('required' => false))
                    ->add('gplusName', null, array('required' => false))
                ->end()
            ->end()
        ;

        if ($this->getSubject() && !$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->tab('Security')
                    ->with('Status')
                        ->add('locked', null, array('required' => false))
                        ->add('expired', null, array('required' => false))
                        ->add('enabled', null, array('required' => false))
                        ->add('credentialsExpired', null, array('required' => false))
                    ->end()
                    ->with('Groups')
                        ->add('groups', 'sonata_type_model', array(
                            'required' => false,
                            'expanded' => true,
                            'multiple' => true
                        ))
                    ->end()
                    ->with('Roles')
                        ->add('realRoles', 'sonata_security_roles', array(
                            'label'    => 'form.label_roles',
                            'expanded' => true,
                            'multiple' => true,
                            'required' => false
                        ))
                    ->end()
                ->end()
            ;
        }

        $formMapper
            ->tab('Security')
                ->with('Keys')
                    ->add('token', null, array('required' => false))
                    ->add('twoStepVerificationCode', null, array('required' => false))
                ->end()
            ->end()
        ;
            
        $formMapper
            ->tab('SMSdroid')
                ->with('Informations')
                    // ->add('computers', 'sonata_type_collection',
                    //     [
                    //             'label' => 'Liste des computers',
                    //             'cascade_validation' => true,
                    //             'by_reference' => true,
                    //             'required' => false,

                    //     ],
                    //     [
                    //             'class' => 'SMS\MainBundle\Admin\PhoneAdmin',
                    //             'admin_code' => 'sms_main.admin.phone',
                    //             'target_entity' => 'SMS\MainBundle\Entity\Computer',
                    //             'edit' => 'inline',
                    //             'inline' => 'table',
                    //             'startFieldset' => true,
                    //     ]
                    // )
               
                ->end()
            ->end()
        ;
 
    }
 }