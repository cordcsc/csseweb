import React, { useState, useEffect } from "react";
import MemberList from "../../components/MemberList";
import Layout from "../../components/Layout";
import Styles from "./Members.module.scss";

import memberData from "../../data/members";

export default function Members() {
  const [members, setMembers] = useState([]);

  useEffect(() => {
    //call to api
    //setMembers(response.data.members)
    console.log(memberData);
    setMembers(memberData);
  }, []);

  return (
    <Layout>
      <div className={Styles.container}>
        <div className={Styles.title}>
          <h1>Members</h1>
        </div>
        <div className={Styles.list}>
          <MemberList members={members} />
        </div>
      </div>
    </Layout>
  );
}
