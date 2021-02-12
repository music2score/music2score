// Imports.
import '../App.css';
import React from 'react';
import Tab from '../components/Tab';
import Tabnav from '../components/Tabnav';

class SignUpSignInPage extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            selected: 'Sign Up',
            fullName: '',
            emailAddress: '',
            userPassword: '',
            userPassword2: ''
        }

    }

    setSelected = (tab) => {
        this.setState({selected: tab})
    }

    setName = (name) => {
        this.setState({fullName: name})
        console.log({name})
    }

    setEmailAddress = (email) => {
        this.setState({emailAddress: email})
        console.log({email})
    }

    setUserPassword = (password) => {
        this.setState({userPassword: password})
        console.log({password})
    }

    setUserPassword2 = (password2) => {
        this.setState({userPassword2: password2})
        console.log({password2})
    }

    signUp = (event) => {
        event.preventDefault()

        if (this.state.userPassword !== this.state.userPassword2) {
            alert('Password verification error: Passwords do not match.')
        }

    }

    signIn = (event) => {
        event.preventDefault()

    }

    render() {
        return(
            <div className='SignUpSignInPage mt-0'>

                <div className='empty-box'>
                </div>

                <div className='container'>
                    <Tabnav tabs={['Sign Up', 'Sign In']} selected={this.state.selected} setSelected={this.setSelected} />
                
                    <Tab isSelected={this.state.selected === 'Sign Up'}>
                        <div className='SignUpTab'>
                            <form className='sign-up-form mt-2' style={{display: 'flex', flexDirection: 'column'}}>
                                
                                <label style={{display: 'flex'}}>
                                    Full Name:  
                                </label>
                                <input type='text' value={this.state.fullName} onChange={event => this.setName(event.target.value)}/>
                                
                                <div className='empty-box2'>
                                </div>

                                <label style={{display: 'flex'}}>
                                    E-Mail Address:  
                                </label>
                                <input type='text' value={this.state.emailAddress} onChange={event => this.setEmailAddress(event.target.value)}/>   

                                <div className='empty-box2'>
                                </div>

                                <label style={{display: 'flex'}}>
                                    Enter Password:  
                                </label>
                                <input type='text' value={this.state.userPassword} onChange={event => this.setUserPassword(event.target.value)}/>        

                                <div className='empty-box2'>
                                </div>

                                <label style={{display: 'flex'}}>
                                    Enter Password Again:  
                                </label>
                                <input type='text' value={this.state.userPassword2} onChange={event => this.setUserPassword2(event.target.value)}/>  

                                <div className='empty-box2'>
                                </div>

                                <input type='submit' value='SignUp' className='done-btn' style={{width: '25%', marginLeft:'38%'}} onClick={event => this.signUp(event)}/>                                                                

                            </form>
                        </div>
                    </Tab>

                    <Tab isSelected={this.state.selected === 'Sign In'}>
                        <div className='SignInTab'>
                            <form className='sign-in-form mt-2' style={{display: 'flex', flexDirection: 'column'}}>

                                <div className='empty-box3'>
                                </div>

                                <label style={{display: 'flex'}}>
                                    E-Mail Address:  
                                </label>
                                <input type='text' value={this.state.emailAddress} onChange={event => this.setEmailAddress(event.target.value)}/>   

                                <div className='empty-box3'>
                                </div>

                                <label style={{display: 'flex'}}>
                                    Enter Password:  
                                </label>
                                <input type='text' value={this.state.userPassword} onChange={event => this.setUserPassword(event.target.value)}/>        

                                <div className='empty-box3'>
                                </div>

                                <input type='submit' value='Login' style={{width: '25%', marginLeft:'38%'}} onClick={event => this.signIn(event)}/>   
                            </form>
                        </div>
                    </Tab>
                </div>
            </div>
        );
    }
}

export default SignUpSignInPage;
