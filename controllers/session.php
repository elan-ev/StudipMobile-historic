<?php

class SessionController extends Trails_Controller
{
    function before_filter(&$action, &$args)
    {
        $this->plugin_path = URLHelper::getURL($this->dispatcher->plugin->getPluginPath());
    }
/*
  def new
    @user_session = UserSession.new
  end

  def create
    @user_session = UserSession.new(params[:user_session])
    if @user_session.save
      flash[:notice] = "Login successful!"
      redirect_back_or_default "/"
    else
      render :action => :new
    end
  end

  def destroy
    current_user_session.destroy
    flash[:notice] = "Logout successful!"
    redirect_back_or_default "/"
  end
*/

    function index_action()
    {
        $this->redirect('session/new');
    }

    function new_action()
    {
    }

    function create_action()
    {
        $username = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];

        if (isset($username) && isset($password)) {
            $result = StudipAuthAbstract::CheckAuthentication($username, $password);
        }

        if (isset($result) && $result['uid'] !== false) {
            $user_id = get_userid($username);
        } else {
            header('WWW-Authenticate: Basic realm="Stud.IP Login"');
            header('HTTP/1.1 401 Unauthorized');

            $exception = new AccessDeniedException('invalid password');
            echo $template_factory->render('access_denied_exception', compact('exception'));
        }

        return $user_id;
    }
}
