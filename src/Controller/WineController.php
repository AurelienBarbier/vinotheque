<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\WineManager;

/**
 * Class WineController
 *
 */
class WineController extends AbstractController
{

    /**
     * Display wine listing
     *
     * @return string
     */
    public function listing()
    {
        $wineManager = new WineManager();
        $winesList = $wineManager->selectAll();
        $welcomeMsg = "Salut l'ami !";
        return $this->twig->render('Wine/index.html.twig',
                                  [
                                    'wines' => $winesList,
                                    'msg' => $welcomeMsg
                                  ]);
    }

    /**
     * Display wine informations specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function show(int $id)
    {
        $wineManager = new WineManager();
        $wine = $wineManager->selectOneById($id);

        return $this->twig->render('Wine/show.html.twig', ['wine' => $wine]);
    }

    /**
     * Display wine edition page specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function update(int $id)
    {
        // TODO : edit wine with id $id
        return $this->twig->render('Wine/edit.html.twig', ['wine', $id]);
    }

    /**
     * Display wine creation page
     *
     * @return string
     */
    public function create()
    {
        var_dump($_POST);
        $wineManager = new WineManager();
        $wineManager->insert($_POST);
        // TODO : add a new wine
        return $this->twig->render('Wine/add.html.twig');
    }

    /**
     * Display wine delete page
     *
     * @param  int $id
     *
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the wine with id $id
        return $this->twig->render('Wine/index.html.twig');
    }
}
