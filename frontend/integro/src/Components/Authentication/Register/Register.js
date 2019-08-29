import React, { Component } from 'react';

import  './Register.css'
import { 
    Button, Card, Row, Col, TextInput 
} from 'react-materialize';



class Register extends Component {
    render() {
        return (
            <div className="background_login">
                <Row>
                    <Col offset="m3" m={6} s={12}>
                        <div align="center" className="myCard login">
                            <TextInput m={12} s={12}  label="name" />
                            <TextInput m={12} s={12}  label="Username" />
                            <TextInput m={12} s={12} password  label="Password" />
                            <Button>Login</Button>
                        </div>
                    </Col>
                </Row>
            </div>
        );
    }
}

export default Register;