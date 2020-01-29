import React from "react";
import Layout from "../components/Layout";
import Styles from "./Home.module.scss";
import { ReactComponent as Phone } from "../assets/PhoneWithApps.svg";
import { ReactComponent as CSSELogo } from "../assets/CSSE.svg";
export default function Home() {
  return (
    <Layout>
      <div className={Styles.container}>
        <div className={Styles.left}>
          <Phone className={Styles.phone} />
        </div>
        <div className={Styles.right}>
          <h1>CSSE</h1>
          <p>Concordia College Computer Science and Engineering Club</p>
        </div>
      </div>
    </Layout>
  );
}
