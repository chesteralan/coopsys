import { CivilStatus, Gender, MemberItem } from "@/typing/member";
import { create } from "zustand";

type MemberStore = {
  firstName: string;
  lastName: string;
  middleName: string;
  dateOfBirth: string;
  placeOfBirth: string;
  religion: string;
  gender: Gender;
  civilStatus: CivilStatus;
  actions: {
    setFirstName: (firstName: string) => void;
    setLastName: (lastName: string) => void;
    setMiddleName: (middleName: string) => void;
    setDateOfBirth: (dateOfBirth: string) => void;
    setPlaceOfBirth: (placeOfBirth: string) => void;
    setReligion: (religion: string) => void;
    setGender: (gender: Gender) => void;
    setCivilStatus: (civilStatus: CivilStatus) => void;
    populateMemberData: (data: Partial<MemberItem>) => void;
    reset: () => void;
  };
};

const useMemberStore = create<MemberStore>()((set) => ({
  firstName: "",
  lastName: "",
  middleName: "",
  dateOfBirth: "",
  placeOfBirth: "",
  religion: "",
  gender: "male",
  civilStatus: "single",
  actions: {
    setFirstName: (firstName: string) => set({ firstName }),
    setLastName: (lastName: string) => set({ lastName }),
    setMiddleName: (middleName: string) => set({ middleName }),
    setDateOfBirth: (dateOfBirth: string) => set({ dateOfBirth }),
    setPlaceOfBirth: (placeOfBirth: string) => set({ placeOfBirth }),
    setReligion: (religion: string) => set({ religion }),
    setGender: (gender: Gender) => set({ gender }),
    setCivilStatus: (civilStatus: CivilStatus) => set({ civilStatus }),
    populateMemberData: (data: Partial<MemberItem>) =>
      set({
        firstName: data.first_name || "",
        lastName: data.last_name || "",
        middleName: data.middle_name || "",
        dateOfBirth: data.date_of_birth || "",
        placeOfBirth: data.place_of_birth || "",
        religion: data.religion || "",
        gender: data.gender || "male",
        civilStatus: data.civil_status || "single",
      } as MemberStore),
    reset: () =>
      set({
        firstName: "",
        lastName: "",
        middleName: "",
        dateOfBirth: "",
        placeOfBirth: "",
        religion: "",
        gender: "male",
        civilStatus: "single",
      } as MemberStore),
  },
}));

export const useMemberActions = () => useMemberStore((state) => state.actions);
export const useMemberFirstName = () =>
  useMemberStore((state) => state.firstName);
export const useMemberLastName = () =>
  useMemberStore((state) => state.lastName);
export const useMemberMiddleName = () =>
  useMemberStore((state) => state.middleName);
export const useMemberDateOfBirth = () =>
  useMemberStore((state) => state.dateOfBirth);
export const useMemberPlaceOfBirth = () =>
  useMemberStore((state) => state.placeOfBirth);
export const useMemberReligion = () =>
  useMemberStore((state) => state.religion);
export const useMemberGender = () => useMemberStore((state) => state.gender);
export const useMemberCivilStatus = () =>
  useMemberStore((state) => state.civilStatus);
