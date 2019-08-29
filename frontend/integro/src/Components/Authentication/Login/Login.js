import React, { Component } from 'react';
import './Login.css'

import { 
    Button, Card, Row, Col, TextInput 
} from 'react-materialize';

// Services
import {
    Login as myLogin
}from '../../../Services/Authentication/Authentication';

class Login extends Component {
    // Constructor
    constructor(props) {
        super(props)
        this.state = {
            username: '',
            password: '' 
        }
        this.login = this.login.bind(this)
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange (evt) {
        this.setState({ [evt.target.name]: evt.target.value });
    }

    login(){
        const user = {
            username: this.state.username,
            password: this.state.password
        }

        console.log(user);
        
        myLogin(user).then(data =>{
            console.log(data);
            
        });
    }

    render() {
        return (
            <div className="background_login">
                <Row>
                <Col offset="m3" m={6} s={12}>
                    <div align="center" className="myCard login">
                    
                        <TextInput name="username" onChange={this.handleChange} m={12} s={12} className="input_large" label="Username" />
                    
                    
                        <TextInput name="password" onChange={this.handleChange} m={12} s={12} password  className="input_large"label="Password" />
                    
                    <Button onClick={()=>this.login()}>Login</Button>
                    </div>
                </Col>
                </Row>
            </div>
        );
    }
}

export default Login;