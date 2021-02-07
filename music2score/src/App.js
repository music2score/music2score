// Import components and CSS styles. 
import './App.css';
import React from 'react';
import Navbar from './components/Navbar';

import Home from './pages';
import AboutPage from './pages/AboutPage';
import MusicServicesPage from './pages/MusicServicesPage';
import ContactPage from './pages/ContactPage';
import SignUpSignInPage from './pages/SignUpSignInPage';
import AccountPage from './pages/AccountPage';
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom';

function App() {

  return (
    <div className='App'>
      <Router >
      <Navbar />
      <Switch>
        <Route path='/' exact component={Home} />
        <Route path='/AboutPage' component={AboutPage} />
        <Route path='/MusicServicesPage' component={MusicServicesPage} />
        <Route path='/ContactPage' component={ContactPage} />
        <Route path='/SignUpSignInPage' component={SignUpSignInPage} />
        <Route path='/AccountPage' component={AccountPage} />
      </Switch>
      </Router>
    </div>
  );
}

export default App;
