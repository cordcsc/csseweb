import React, { useState, useEffect } from "react";
import Layout from "../components/Layout";
import Styles from "./Contact.module.scss";
import Axios from "axios";

export default function Contact() {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [message, setMessage] = useState("");

  function onSubmit(e) {
    e.preventDefault();
    Axios.post("http://localhost:3000/api/test.php", {
      name,
      email,
      message,
    })
      .then(function(response) {
        console.log(response);
      })
      .catch(function(error) {
        console.log(error);
      });
  }

  // useEffect(() => {}, []);

  return (
    <Layout>
      <div className={Styles.page}>
        <h1>Contact</h1>
        <p>
          Contact the Concordia Computer Science and Engineering Club using the
          form below.
        </p>
        <div>
          <form className={Styles.container} onSubmit={onSubmit}>
            <input
              type="text"
              value={name}
              name="name"
              onChange={e => setName(e.target.value)}
              placeholder="Name"
              autoComplete="off"
            />
            <input
              type="text"
              value={email}
              name="email"
              onChange={e => setEmail(e.target.value)}
              placeholder="Email"
              autoComplete="off"
            />
            <textarea
              value={message}
              name="message"
              onChange={e => setMessage(e.target.value)}
              placeholder="Message"
              autoComplete="off"
            />
            <input type="submit" value="Submit" />
          </form>
        </div>
      </div>
    </Layout>
  );
}
