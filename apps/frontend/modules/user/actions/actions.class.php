<?php

/**
 * user actions.
 *
 * @package    twitarch
 * @subpackage user
 * @author     Herbert Muehlburger
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->twitter_users = Doctrine::getTable('TwitterUser')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->twitter_user = Doctrine::getTable('TwitterUser')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->twitter_user);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TwitterUserForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TwitterUserForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($twitter_user = Doctrine::getTable('TwitterUser')->find(array($request->getParameter('id'))), sprintf('Object twitter_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new TwitterUserForm($twitter_user);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($twitter_user = Doctrine::getTable('TwitterUser')->find(array($request->getParameter('id'))), sprintf('Object twitter_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new TwitterUserForm($twitter_user);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($twitter_user = Doctrine::getTable('TwitterUser')->find(array($request->getParameter('id'))), sprintf('Object twitter_user does not exist (%s).', $request->getParameter('id')));
    $twitter_user->delete();

    $this->redirect('user/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $twitter_user = $form->save();

      $this->redirect('user/edit?id='.$twitter_user->getId());
    }
  }
}