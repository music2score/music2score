// Import components and CSS styles. 
import './App.css';
import React from 'react';
import Navbar from './components/Navbar';
// import Header from './components/Header';
import Home from './pages';
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom';

function App() {

  return (
    <div className='App'>
      <Router >
      <Navbar />
      {/* <Header /> */}
      <Switch>
        <Route path='/' exact component={Home} />
      </Switch>
      </Router>
    </div>
  );
}

export default App;
