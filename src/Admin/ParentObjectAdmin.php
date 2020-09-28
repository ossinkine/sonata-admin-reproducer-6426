<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;

final class ParentObjectAdmin extends AbstractAdmin
{
    protected $formOptions = [
        'csrf_protection' => false,
    ];

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add(
                'childObjects',
                CollectionType::class,
                [
                    'type_options' => [
                        'btn_add' => true,
                    ],
                    'required' => false,
                ],
                [
                    'inline' => 'table',
                    'edit' => 'inline',
                ]
            )
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
        ;
    }
}
