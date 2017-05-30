
import React, { Component } from 'react';
import { Image,WebView } from 'react-native';
import { connect } from 'react-redux';
import { actions } from 'react-native-navigation-redux-helpers';
import { Container, Content, InputGroup, Input, Button, Icon, View } from 'native-base';

import { setUser } from '../../actions/user';
import styles from './styles';

const {replaceAt, } = actions;

const background = require('../../../images/shadow.png');

// firebase
import * as firebase from 'firebase';
const firebaseConfig = { //Initialize Firebase
        apiKey : " AIzaSyDUYgwikGBTUhggHc0-TT19dI03zYYRjLc",
        //authDomain: "<your-auth-domain>",
        databaseURL : "https://fundy-1378.firebaseio.com",
        storageBucket : "fundy-1378.appspot.com",
};
const firebaseApp = firebase.initializeApp(firebaseConfig);

//fb
const FBSDK = require('react-native-fbsdk');
const {
  LoginButton,
  AccessToken
} = FBSDK;

var FBLogin = React.createClass({
  render: function() {
    return (
      <View>
        <LoginButton
          publishPermissions={["publish_actions"]}
          onLoginFinished={
            (error, result) => {
              if (error) {
                alert("login has error: " + result.error);
              } else if (result.isCancelled) {
                alert("login is cancelled.");
              } else {
                AccessToken.getCurrentAccessToken().then(
                  (data) => {
                    alert(data.accessToken.toString())
                  }
                )
              }
            }
          }
          onLogoutFinished={() => alert("logout.")}/>
      </View>
    );
  }
});

class Login extends Component {
        static propTypes = {
                setUser : React.PropTypes.func,
                replaceAt : React.PropTypes.func,
                navigation : React.PropTypes.shape({
                        key : React.PropTypes.string,
                }),
        }

        constructor(props) {
                super(props);
                this.state = {
                        name : '',
                        pass : '',
                };

                register = this.register.bind(this)
                login = this.login.bind(this)
                onUser = this.onUser.bind(this)
                signOut = this.signOut.bind(this)
                replaceRoute = this.replaceRoute.bind(this)

                this.itemsRef = firebaseApp.database().ref();
                this.listenForItems(this.itemsRef);
                this.itemsRef.push({
                        title : "lalalala"
                })

                //this.onUser();
        }

        componentDidMount() {}

        setUser(name) {
                this.props.setUser(name);
        }

        replaceRoute(route) {
                this.setUser(this.state.name);
                this.props.replaceAt('login', {
                        key : route
                }, this.props.navigation.key);
        }

        render() {

            const webapp = require('./coin-tap-game.html');
                return (
        <View style={styles.container}>
        <WebView
        source={webapp}
        style={{marginTop: 10}}
      />
          <Content>
            <Image source={background} style={styles.shadow}>
              <View style={styles.bg}>
                <InputGroup style={styles.input}>
                  <Icon name="ios-person" />
                  <Input placeholder="EMAIL" onChangeText={name => this.setState({
                                name
                        })} />
                </InputGroup>
                <InputGroup style={styles.input}>
                  <Icon name="ios-unlock-outline" />
                  <Input
                        placeholder="PASSWORD"
                        secureTextEntry
                        onChangeText={pass => this.setState({
                                pass
                        })}
                        />
                </InputGroup>
                <Button style={styles.btn} onPress={() => this.login(this.state.name, this.state.pass)}>
                  Login
                </Button>
                  <FBLogin/>
              </View>
            </Image>
          </Content>

        </View>
                        );
        }

        //
        listenForItems(itemsRef) {
                itemsRef.on('value', (snap) => {

                        // get children as an array
                        var items = [];
                        snap.forEach((child) => {
                                items.push({
                                        title : child.val().title,
                                        _key : child.key
                                });
                                console.log(child.val().title);
                        });


                });
        }

        //"1don.ling.lok@gmail.com", "aabbccdd"
        register(email, password) {
                firebaseApp.auth().createUserWithEmailAndPassword(email, password)
                        .catch(function(error) {
                                // Handle Errors here.
                                var errorCode = error.code;
                                var errorMessage = error.message;
                                if (errorCode == 'auth/weak-password') {
                                        alert('The password is too weak.');
                                } else {
                                        alert(errorMessage);
                                }
                                console.log(error);

                                login(email, password);
                        });
        }

        login(email, password) {
//                firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
//                        // Handle Errors here.
//                        var errorCode = error.code;
//                        var errorMessage = error.message;
//
//                        alert(errorMessage);
//                });
                

                var provider = new firebase.auth.FacebookAuthProvider();
                provider.setCustomParameters({
                    'display': 'popup'
                  });
                
                firebase.auth().signInWithCredential(firebase.auth.FacebookAuthProvider.credential(fbAccessToken));
        }

        onUser() {
                firebase.auth().onAuthStateChanged(function(user) {
                        if (user) {
                                // User is signed in.
                                var user = firebase.auth().currentUser;

                                if (user != null) {
                                        user.providerData.forEach(function(profile) {
                                                console.log("Sign-in provider: " + profile.providerId);
                                                console.log("  Provider-specific UID: " + profile.uid);
                                                console.log("  Name: " + profile.displayName);
                                                console.log("  Email: " + profile.email);
                                                console.log("  Photo URL: " + profile.photoURL);
                                        });

                                        replaceRoute('home');
                                }

                        //signOut();
                        } else {
                                // No user is signed in.
                        }
                });
        }

        signOut() {
                firebase.auth().signOut().then(function() {
                        // Sign-out successful.
                }, function(error) {
                        // An error happened.
                });
        }

}

function bindActions(dispatch) {
        return {
                replaceAt : (routeKey, route, key) => dispatch(replaceAt(routeKey, route, key)),
                setUser : name => dispatch(setUser(name)),
        };
}

const mapStateToProps = state => ({
        navigation : state.cardNavigation,
});

export default connect(mapStateToProps, bindActions)(Login);