<?php
namespace Drupal\nodeload\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Drupal\node\Entity\Node;
use \Drupal\Core\Config\Entity\Query\Query;
use \Drupal\Core\Entity\Query\QueryFactory;
use \Drupal\Core\Entity\Query\QueryInterface;

class RoarController extends ControllerBase
{
    public function roar()
    {
		$query = \Drupal::entityQuery('node');
		$query->condition('status', 1);
		$query->condition('type', 'article');
		$entity_ids = $query->execute();
		foreach($entity_ids as $key => $val) {
			$node = Node::load($val);
			echo $title = $node->get('title')->value;
			echo "</br>";
		}
    }
}
