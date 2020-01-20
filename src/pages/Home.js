import React from "react";
import Layout from "../components/Layout";
import Styles from "./Home.module.scss";
import { ReactComponent as Phone } from "../assets/PhoneWithApps.svg";
import { ReactComponent as CSSELogo } from "../assets/CSSE.svg";
export default function Home() {
  return (
    <Layout>
      <div className={Styles.container}>
        <Phone className={Styles.phone} />
      </div>
      <div className={Styles.container}>
        <CSSELogo />
      </div>
    </Layout>
  );
}
