<?


namespace App\Form;

use App\Entity\Compagny;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameCompany', TextType::class, [
                'label' => 'Nom de l\'entreprise',
            ])
            ->add('emailCompany', EmailType::class, [
                'label' => 'Email de l\'entreprise',
            ])
            ->add('videoCompany', TextType::class, [
                'label' => 'Lien de la vidéo',
                'required' => false, 
            ])
            ->add('logoCompany', TextType::class, [
                'label' => 'Lien du logo',
                'required' => false, 
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Compagny::class,
        ]);
    }
}
