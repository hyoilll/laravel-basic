import React, { useState } from "react";
import {
  StyleSheet,
  Text,
  TextInput,
  TouchableOpacity,
  View,
} from "react-native";
import axios from "axios";
import { useForm, Controller } from "react-hook-form";

interface User {
  id: number;
  name: string;
  email: string;
}

const Home = () => {
  const [users, setUsers] = useState<User[]>([]);
  const {
    control,
    handleSubmit,
    formState: { errors },
  } = useForm({
    defaultValues: {
      firstName: "",
      lastName: "",
    },
  });

  const handlerSelect = () => {
    console.log("Select");

    const name = "";

    axios
      .get(
        `http://127.0.0.1/php_basic/reactNative_php_mysql/select.php?name=${name}`
      )
      .then((res) => {
        console.log("データ送信成功。サーバーからのレスポンス：");

        res.data.map((user) => {
          console.log(
            `ID: ${user.id}, 名前: ${user.name}, メール: ${user.email}`
          );
        });
        setUsers(res.data);
      })
      .catch((err) => {
        console.log("error");
        console.error(err);
      });
  };

  const handlerInsert = () => {
    console.log("Insert");

    const id = 100;
    const name = "hyoil";
    const email = "hyoil@gmail.com";
    const jsonData = { id: id, name: name, email: email, type: "insert" };

    axios
      .post(
        "http://127.0.0.1/php_basic/reactNative_php_mysql/insert.php",
        jsonData
      )
      .then((res) => {
        console.log("データ送信成功。サーバーからのレスポンス：" + res.data);
      })
      .catch((err) => {
        console.log("error");
        console.error(err);
      });
  };

  const handlerUpdate = () => {
    console.log("Update");

    const name = "yuki";
    const email = "yuki@gmail.com(update)";
    const jsonData = { name: name, email: email };

    axios
      .post(
        "http://127.0.0.1/php_basic/reactNative_php_mysql/update.php",
        jsonData
      )
      .then((res) => {
        console.log("データ送信成功。サーバーからのレスポンス：");
        res.data.map((user) => {
          console.log(
            `ID: ${user.id}, 名前: ${user.name}, メール: ${user.email}`
          );
        });
      })
      .catch((err) => {
        console.log("error");
        console.error(err);
      });
  };
  const handlerDelete = () => {
    console.log("Delete");

    const name = "yuki";
    const jsonData = { name: name };

    axios
      .post(
        "http://127.0.0.1/php_basic/reactNative_php_mysql/delete.php",
        jsonData
      )
      .then((res) => {
        console.log("データ送信成功。サーバーからのレスポンス：");
        res.data.map((user) => {
          console.log(
            `ID: ${user.id}, 名前: ${user.name}, メール: ${user.email}`
          );
        });
      })
      .catch((err) => {
        console.log("error");
        console.error(err);
      });
  };

  return (
    <View>
      {users.length < 1 ? (
        <Text>not saved user data</Text>
      ) : (
        users.map((user) => {
          return (
            <Text key={user.id}>
              name: {user.name}, email: {user.email}
            </Text>
          );
        })
      )}
      <View>
        <TouchableOpacity style={styles.button} onPress={handlerSelect}>
          <Text>Select</Text>
        </TouchableOpacity>
        <TouchableOpacity
          style={styles.button}
          onPress={handleSubmit(handlerInsert)}
        >
          <Text>Insert</Text>
        </TouchableOpacity>
        <TouchableOpacity style={styles.button} onPress={handlerUpdate}>
          <Text>Update</Text>
        </TouchableOpacity>
        <TouchableOpacity style={styles.button} onPress={handlerDelete}>
          <Text>Delete</Text>
        </TouchableOpacity>
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  button: {
    alignItems: "center",
    backgroundColor: "#DDDDDD",
    padding: 10,
    marginTop: 20,
  },
});

export default Home;
