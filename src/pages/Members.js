import React, { useState, useEffect } from "react";
import MemberList from "../components/MemberList";
import Layout from "../components/Layout";

export default function Members() {
  const [members, setMembers] = useState([]);

  useEffect(() => {
    //call to api
    //setMembers(response.data.members)
  }, []);

  return (
    <Layout>
      <h1>Members</h1>
      <div>
        <MemberList members={members} />
      </div>
    </Layout>
  );
}
