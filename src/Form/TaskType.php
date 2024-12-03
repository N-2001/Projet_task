<?php

namespace App\Form;

use App\Entity\Task;
use App\Enum\Status;  // Assurez-vous d'importer l'énumération Status
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['placeholder' => 'Entrez le titre de la tâche'],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['placeholder' => 'Décrivez la tâche'],
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'À faire' => Status::TODO,  // Utilisation de la valeur de l'énumération
                    'En cours' => Status::IN_PROGRESS,  // Utilisation de la valeur de l'énumération
                    'Terminé' => Status::DONE,  // Utilisation de la valeur de l'énumération
                ],
                'placeholder' => 'Choisissez un statut',  // Ajout d'un texte par défaut
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
